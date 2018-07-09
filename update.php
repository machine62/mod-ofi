<?php
/**
 * @package Xtense 2
 * @author Unibozu
 * @version 1.0
 * @licence GNU
 */

if (!defined('IN_SPYOGAME')) die("Hacking Attempt!");
global $db,$table_prefix;

define("TABLE_XTENSE_CALLBACKS", $table_prefix . "xtense_callbacks");

$mod_folder = "timeobservatory";
$mod_name = "timeobservatory";



update_mod($mod_folder, $mod_name);

