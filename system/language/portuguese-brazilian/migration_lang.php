<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

defined("BASEPATH") or exit("No direct script access allowed");
$lang["migration_none_found"] = "Nenhuma migração foi encontrada.";
$lang["migration_not_found"] = "Nenhuma migração foi encontrada com o número da versão: %s.";
$lang["migration_sequence_gap"] = "Na sequecia de migração Gap o próximo número da versão não existe.: %s.";
$lang["migration_multiple_version"] = "Esta são as multiplas migrações com o mesmo número de versão: %s.";
$lang["migration_class_doesnt_exist"] = "A classe de migração \"%s\" não pode ser encontrada.";
$lang["migration_missing_up_method"] = "A classe de migração \"%s\" está faltando o método \"up\".";
$lang["migration_missing_down_method"] = "A classe de migração \"%s\" está falntando o método \"down\".";
$lang["migration_invalid_filename"] = "A migração \"%s\" tem nome de arquivo inválido.";

?>