# Survey: Smarty → native CI4 view conversion options

Research ticket: [#5](https://github.com/syaikhipin/data-visual/issues/5) · branch `research/smarty-to-ci4-views` · 2026-10-10
Scope: how to move DbFace 8.3's Smarty view layer (`application/views/**/*.tpl`, delimiters `[{ … }]`) onto CodeIgniter 4.7 native PHP views, as chosen by ADR-0001 (`docs/adr/0001-port-to-codeigniter-4.md`, currently local on `master`).

## Recommendation (TL;DR)

**Step 0 — recover template plaintext (blocking prerequisite).** All 530 app templates are still ionCube/EasyToYou-encrypted (`!odMbo!` containers); nothing can be ported or even inventoried until plaintext exists. Fastest recovery path is the original DbFace 8.3 distribution package (see §2).

**Then: option (c) hybrid — codemod + manual fixup.** A small `[{ … }]`-grammar transpiler handles the 341 tiny + most medium templates mechanically (they are small: median 1.3 KB, ~1.23 MB total); the 18 large layout/form-builder templates, the 27 custom plugins, and the include-graph get manual ports. User-authored `fetch("string:…")` templates (runtime data in `dc_apps`) cannot be codemodded — keep a scoped Smarty 4/5 renderer for those or freeze that feature. Estimated **~120–160 h (~3–4 person-weeks)** for the measured surface, plus the recovery step.

## 1. Local inventory (facts from this checkout)

### 1.1 What exists

| Item | Count | Source |
|---|---|---|
| `.tpl` under `application/views` | **530** | `find application/views -name '*.tpl' \| wc -l` |
| — of which ionCube/EasyToYou-encrypted (`!odMbo!` header) | **530 (all)** | `grep -l '^!odMbo!'` on every file |
| plaintext `.tpl` under `plugins/templates/*/index.tpl` | 4 (codebox, barcard, hello, basecard) | read directly |
| other view assets | 70 svg, 24 json, 12 php, 6 html | `find application/views -type f ! -name '*.tpl'` |
| Smarty bundled | **3.1.32** (`SMARTY_VERSION`, `application/libraries/Smarty/libs/Smarty.class.php:464`) | tag date 2018-04-24 ([smarty-php/smarty](https://github.com/smarty-php/smarty/releases)) |
| custom Smarty plugins | **27** in `plugins/script/` | listing |
| custom plugins shipped by Smarty 3.1.32 | 50 in `application/libraries/Smarty/libs/plugins/` | listing |

The same encryption hit Smarty's own stock `application/libraries/Smarty/libs/debug.tpl` — evidence that the *original DbFace distribution* ionCube-encrypted non-PHP files too (the Encoder supports [encoding files with non-default extensions](https://www.ioncube.com/sa/USER-GUIDE.pdf) §2.7.3, and the Loader "handles execution of encoded PHP files, encrypting or decrypting non-PHP files" — ionCube Encoder User Guide).

### 1.2 Blocker: template sources are unreadable

Every one of the 530 `.tpl` files starts with `!odMbo!` followed by base64 that decodes to high-entropy ciphertext (printable ratio ≈ 0.38, no common header, no local decrypt hook in the decoded PHP: zero hits for `ioncube_read_file`/`mcrypt`/resource filters in `application/`). The PHP files were decoded by EasyToYou (decoder watermarks in the initial import; stripped on local `master` in commit `7c439966`); the non-PHP `.tpl` files came back untouched in `!odMbo!` containers. **Consequence: the syntax-feature grep the ticket asks for (`{$`, `{foreach`, `{if}`, `{section}`, `{include}`, modifiers, `{extends}`…) currently returns 0 hits across all 530 app templates — the inventory must be redone the moment plaintext is recovered.** What we *can* measure today:

### 1.3 Template engine wiring (from decoded PHP)

- `application/libraries/Smartyview.php` (extends `Smarty`): template dirs = per-creator `user/files/<id>/templates`, `config/templates`, `application/views`; plugins dir `plugins/script`; compile/cache dir `user/cache`; **delimiters `[{` / `}]`** (lines 75–76).
- `MY_Controller::_get_template_engine()` (line 1292) creates bare `Smarty`/`SmartyBC` instances for *user-authored* content — default `{ … }` delimiters, overridable via `config['tpl_engine_left_delimiter']` (`application/config/config.php:100`); a third engine instance at `MY_Controller.php:1248` also uses `[{ }]`. **The port faces two dialects: app views `[{ }]`, user/plugin content `{ }`.**
- Render call sites: **290 `->display(` + 69 `->fetch(`**; 371 literal `.tpl` string mentions in decoded PHP → **245 unique template names, 235 of which exist on disk** (~285 on-disk templates are reached only via `{include}` chains, dynamic names, or are dead — unknown until decryption).
- Most-referenced: `runtime/index.tpl` ×41, `warehouse/db_structure.tpl` ×7, `login/login.tpl` ×5, `runtime/app.htmlreport.tpl` ×4.
- **7 `fetch("string:" …)` / `fetch("eval:" …)` call sites** (`MY_Controller.php:1159,1167,1387,1454`, `App.php:6005,6010`…) render *user-stored* Smarty markup (htmlreport apps). This is runtime data, not files — a codemod cannot touch it.
- The 4 plaintext plugin templates use `{$var}`, `{$var|default:'…'}`, `{section name=i loop=$data}` (Smarty-2-era `{section}`), confirming at least: variable output, `|default` modifier, `{section}` in the ecosystem's dialect.

### 1.4 Custom plugin surface (what templates may call)

`plugins/script/` (decoded, readable): 11 function tags — `config`, `create_variable`, `filter`, `nocache`, `purge_cache`, `serverside`, `snippet`, `source`, `tabular_foot`, `template`, `userdata`; 16 modifiers — `day_of_month`, `day_of_week`, `day_of_year`, `db_display_name`, `df_number_format`, `epoch`, `from`, `hour_of_day`, `join`, `min_of_hour`, `month_of_year`, `sec_of_min`, `tabular_value_format`, `to`, `usercolumn`, `year_only`. Any CI4 target must re-home these as view helpers/filters (they are plain PHP functions already).

### 1.5 Complexity tiers (proxy: ciphertext length ≈ plaintext length)

Ciphertext length is a faithful size proxy (block cipher padding only), measured by base64-decoding every file:

| Tier | Count | Share | Notes |
|---|---|---|---|
| small < 2 KB | **341** | 64 % | trivial fragments; mostly `inc/`, field settings |
| medium 2–10 KB | **171** | 32 % | forms, tables, dialogs |
| large ≥ 10 KB | **18** | 4 % | layout/form-builder giants |
| total | 530 | | ≈ **1.23 MB** plaintext, median 1,311 B, max 24,772 B |

Largest: `openkit/inc.charttype.tpl` (24.8 KB), `new/conn.create.tpl` (21.5 KB), `appbuilder/section.formbuilder.tpl` (20.7 KB), `inc/datatype.settings.tpl` (16.9 KB), `warehouse/db_structure.tpl` (14.6 KB), six more `appbuilder/*` option panels, `datagrid.tpl`, `new/frame.tpl`, `wa/dashboard.builder.tpl`. Hot dirs by count: `appbuilder/` 93, `new/` 68, `runtime/` 64, `inc/` 45, `openkit/` 27.

Once plaintext lands, re-run this exact classification on *content* (loop count, include depth, modifier density) — method: grep tallies per the ticket (`\[\{\$`, `\[\{foreach`, `\[\{if`, `\[\{include`, `|`, …) plus `{include}` graph extraction.

## 2. Recovering the encrypted templates (prerequisite step 0)

Options, in recommended order:

1. **Original DbFace 8.3 distribution** (self-hosted package from [dbface.com](https://dbface.com/)). If the vendor package ships `.tpl` encrypted the same way, the *licensed* copy still needs the loader to run, so this only helps if vendor ships plaintext — **verify before planning around it**. [INFERENCE: untested]
2. **Runtime harvest under the ionCube Loader on era PHP (5.6):** ionCube's Loader explicitly handles "decrypting non-PHP files" ([Encoder User Guide](https://www.ioncube.com/sa/USER-GUIDE.pdf)); Smarty writes compiled PHP to `$compile_dir` (`user/cache`, per [Smarty `$compile_dir` docs](https://smarty-php.github.io/smarty/4.x/programmers/api-variables/variable-compile-dir/)). Running the original encoded app once per page and collecting `user/cache/*^*` compiled files recovers *compiled* PHP (not `.tpl` source) for every visited page — enough to reconstruct or even to port from directly. [INFERENCE: requires the original encoded build + loader; feasibility unverified]
3. **Re-submit `.tpl` to a decode service** — EasyToYou's product is scoped to PHP files ([easytoyou.eu](https://easytoyou.eu/)), so non-PHP `.tpl` support is unlikely. [INFERENCE]
4. **Rebuild** the ~20 highest-value templates by hand from rendered HTML — fallback only; not feasible for 530 files.

## 3. External survey (prior art & maintenance status)

### Smarty maintenance / PHP 8 compat (context for the drop-Smarty decision)

- Requirements per the official download page: **Smarty 3.x: PHP 5.2+ · 4.x: PHP 7.1+ · 5.x: PHP 7.2+** ([smarty.net/download](https://www.smarty.net/download)); composer constraints confirm `^7.1 || ^8.0` (smarty 4.5.5) and `^7.2 || ^8.0` (smarty 5.5.1) ([smarty-php/smarty composer.json](https://github.com/smarty-php/smarty)).
- So Smarty itself is **not** the blocker on PHP 8.2: Smarty 4 runs on "PHP 7.1 to PHP 8.3" ([4.x getting-started](https://smarty-php.github.io/smarty/4.x/getting-started)); current release line is 5.x (v5.8.5, 2026-10-04; GitHub releases).
- The bundled **3.1.32 is 2018-era**; the 3.1.x line ended at **v3.1.48 (2023-03-28)** (GitHub tags). Upgrading 3.1.32 → 4.x/5.x is a real migration (removed `{php}`, API changes — [5.x upgrading notes](https://smarty-php.github.io/smarty/5.x/upgrading)). Dropping Smarty for views (ADR-0001) avoids carrying a template-engine dependency *and* the 3→5 upgrade project; keeping it merely for user-authored content (§4) is cheap because Smarty 4 supports PHP 8.2.

### Smarty → PHP / Twig converters (prior art)

- **No maintained Smarty→native-PHP converter exists.** The known transpilers target **Twig**, not plain PHP:
  - [OXID-eSales/smarty-to-twig-converter](https://github.com/OXID-eSales/smarty-to-twig-converter) — active (pushed 2026-05), 28 ★, regex-based Twig converter built for OXID's own migration.
  - [victormacko/to-twig](https://github.com/victormacko/to-twig) — dormant since 2017, 2 ★.
  Both are useful as *reference implementations* of the codemod approach (token/regex passes with manual fixups), not as drop-in tools; neither speaks DbFace's `[{ }]` delimiters or its 27 custom plugins.
- **Smarty's own compiler is the strongest Smarty→PHP transpiler**: Smarty compiles every template to PHP code in `$compile_dir` ([official docs](https://smarty-php.github.io/smarty/4.x/programmers/api-variables/variable-compile-dir/)). Community migrations to native PHP have harvested exactly that compiled output as a starting point ([r/PHPhelp discussion](https://www.reddit.com/r/PHPhelp/comments/1j3a6al/convert_smarty_templates_to_native_php)). Caveat: compiled code targets Smarty's `$_smarty_tpl` runtime API — good as a *mechanical reference/oracle*, not as end-state CI4 views.
- Large-scale hand-migration precedent: omegaUp migrated its Smarty frontend page-by-page over time ([migration guide](https://omegaup.github.io/documentation/en/development/migration-guide)) — evidence that (a) hand-porting a big `.tpl` estate works, (b) doing it without a codemod is slow.
- Target shape: CI4 views are plain PHP fragments loaded with `view('name', $data)`, escaped via `<?= esc($x) ?>`, composable (`view('header') . view('menu')`), with optional per-call `$saveData` ([CI4 User Guide — Views](https://codeigniter4.github.io/userguide/outgoing/views.html)) — a direct fit for flattening `{include}` partials into `view()` calls.

## 4. Options for the port

| | (a) hand-port all | (b) pure codemod | **(c) hybrid codemod + manual fixup** ✅ |
|---|---|---|---|
| Approach | rewrite 530 files by hand | transpiler emits CI4 views, no touching | transpiler for mechanical tiers; humans for edges |
| Fits the surface? | yes but slow; 64 % of files are < 2 KB — hand work has poor ROI there | no: `{include}` graph, 27 custom plugins, `[{ }]` dialect, escaping semantics need judgment | yes |
| Risks | schedule; drift | silent breakage in escaping/logic; unmaintainable generated code | must build a small tool (~1 week) + own its edge cases |
| Estimate* | ~290 h | ~145–165 h | **~120–160 h (~3–4 person-weeks)** |

\* Estimates, not measurements [INFERENCE]. Assumptions: plaintext recovered; one engineer fluent in CI4; per-template effort small ≈ 15 min, medium ≈ 45 min, large ≈ 3 h (hand); codemod build 40–60 h incl. tests; codemod review ≈ 5 min/template; large 18 always manual; 27 plugin ports ≈ 1 h each.

### Recommended pipeline (c)

1. **Recover plaintext** (§2) → immediately produce the syntax-feature tally + `{include}` graph this survey had to skip, and re-tier on content.
2. **Build the transpiler** (a day-zero investment): tokenize on `[{` … `}]` (the delimiter makes regex-safe scanning easy), map:
   - `[{$x}]` → `<?= esc($x) ?>` (audit which vars are HTML-safe vs need `esc()`; Smarty's default is *no* escaping, so a naive `esc()` pass changes output — flag per-site);
   - `[{$x|mod:args}]` → helper calls; the 16 custom modifiers become a `DfFormat` helper class, the 11 function tags become `view_cell`/partials;
   - `[{if}…[{elseif}…[{else}]` → `<?php if/…/else: ?>`; `[{foreach}]` → `<?php foreach: ?>`;
   - `[{include file='x.tpl'}]` → `<?= view('x', …) ?>` with data-flow audit.
   Use the OXID converter's pass structure as prior art; use Smarty 3.1.32 itself as an **oracle** (compile each template, diff rendered HTML old-vs-new on golden pages).
3. **Manual ports** for the 18 large templates, the frame/layout chains (`frame.*.tpl`, `new/frame.tpl`, `inc/*`), and anything the transpiler can't prove.
4. **Handle user-authored Smarty separately** (decision point for Main): `fetch("string:…")` htmlreport content is *data* written by end users in `[{ }]`/`{ }` dialects. Either keep a scoped Smarty 4 renderer for that feature only (PHP 8.2-compatible, per §3) or deprecate the feature. Do **not** attempt to codemod runtime data.

## 5. Next actions

1. New ticket: template-source recovery (§2) — blocks all view-layer work; 530 files.
2. After recovery: re-run feature tally + include-graph; refine tiers from ciphertext-proxy to content-based.
3. Decide user-authored-template strategy (Smarty 4 scoped dependency vs feature freeze) — needs an owner call, ~2 lines in map #1 once made.
