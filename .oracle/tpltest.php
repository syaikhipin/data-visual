<?php
// .tpl decryption probe: which mechanism yields plaintext template source?
$f = $argv[1];
echo "ioncube_read_file: ";
$rf = ioncube_read_file($f);
var_dump(is_string($rf) ? array("len" => strlen($rf), "head" => substr($rf, 0, 60)) : $rf);

echo "include+ob: ";
ob_start();
@include $f;
$out = ob_get_clean();
var_dump(array("len" => strlen($out), "head" => substr($out, 0, 60)));

echo "file_get_contents head: ";
$raw = file_get_contents($f);
var_dump(substr($raw, 0, 60));
