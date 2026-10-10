# Revive DbFace by porting to CodeIgniter 4.7.x on PHP 8.2

DbFace 8.3 exists here as an ionCube-decoded CodeIgniter 3.2.0-dev application targeting PHP 5.6; CI3 is end-of-life (last release 3.1.13, Jan 2023). We are porting the application to CodeIgniter 4.7.x running natively on local PHP 8.2 (SQLite metadata store, clean data, phone-home disabled), accepting a multi-session port of ~4,870 decoded files in exchange for a maintained framework.

## Considered Options

- **Frozen revival** (era PHP 5.6/7.4 in Docker, fastest to working): rejected by owner — re-freezes the obsolescence.
- **Official CI 3.1.13 swap** (days to working, MIT, PHP 8.1-tested): recommended by the agent as a stepping stone, rejected by owner — still an EOL framework.
- **Port to CI 4.7.x** (chosen): maintained framework, weeks-to-months of porting decoded code with no working reference.

Owner explicitly accepted the cost after seeing the trade-off (2026-10-10 grilling session).
