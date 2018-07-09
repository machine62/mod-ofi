<?php
if (!defined('IN_SPYOGAME')) die("Hacking Attempt!");
require_once("views/page_header.php");
include_once("mod/ofi/common.php");

//telechargement de la derniere version du script
getLatestSim();

//page principale
$data = array();

//recupération du formulaire
$form = array();
$form["gmax"]= (isset($pub_gmax)) ? (int)$pub_gmax : 9;
$form["gmin"]= (isset($pub_gmin)) ? (int)$pub_gmin :1;
$form["smax"]= (isset($pub_smax)) ? (int)$pub_smax :499;
$form["smin"]= (isset($pub_smin)) ? (int)$pub_smin :1;
$form["dayre"]= (isset($pub_dayre)) ? (int)$pub_dayre :999;
$form["limite"]= (isset($pub_limite)) ? (int)$pub_limite :200;
$form["isplayerre"]= (isset($pub_isplayerre)) ? true :false;
$form["isplayername"]= (isset($pub_isplayername)) ? true :false;
$form["playername"]= (isset($pub_isplayername)) ?  $db->sql_escape_string($pub_playername) :"";
$form["isallyname"]= (isset($pub_isallyname)) ? true :false;
$form["allyname"]= (isset($pub_isallyname)) ?  $db->sql_escape_string($pub_allyname) :"";


$data["form"]= $form;
$data["re"] = getREbyFilter($form);


include(FOLDER_CSS."/css.php");
include(FOLDER_VIEW."/ofi.php");
include(FOLDER_VIEW."/infore.php");




require_once("views/page_tail.php");
include(FOLDER_JS."/js.php");

