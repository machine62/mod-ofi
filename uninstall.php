<?php
/**
 * @package Xtense 2
 * @author Unibozu
 * @version 1.0
 * @licence GNU
 */

if (!defined('IN_SPYOGAME')) die("Hacking Attempt!");

global $de,$table_prefix;
$mod_uninstall_name = "timeobservatory";
uninstall_mod ($mod_uninstall_name, $mod_uninstall_table);

