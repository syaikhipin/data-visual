# DbFace (data-visual)

Self-hosted PHP reporting/app-builder platform (DbFace 8.3 "pro", build 20190211), revived to run natively on PHP 8.2.

## Language

**DbFace**:
The commercial product this repo contains: an online application builder that turns SQL data sources into reports, forms, and dashboards.
_Avoid_: data-visual (repo name only), "the platform"

**App**:
A single report, form, or dashboard artifact a user builds in DbFace on top of a Connection (stored in `dc_app`).
_Avoid_: application (that's the CodeIgniter `application/` directory), page, report (too narrow)

**Connection**:
A configured external data source that DbFace Apps query (stored in `dc_conn`): MySQL, Postgres, SQLite, MongoDB, REST, etc.
_Avoid_: datasource (that names the plugin type), database (collides with the metadata store)

**Plugin**:
An extension package under `plugins/` or `user/plugins/` (datasources, editor, ide, insights, script, templates).
_Avoid_: module, addon

**Metadata store**:
The SQLite/MySQL/Postgres database (`dc_*` tables) holding DbFace's own state: users, Apps, Connections, templates — distinct from the Connections' data.
_Avoid_: the database (ambiguous with Connection targets)
