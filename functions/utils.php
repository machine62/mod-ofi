<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2018
 * Time: 14:05
 */
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");
const IS_RES = 0; // on ne voit rien (retouce uniquement )
const IS_FLOTTE = 1; // ress + flotte
const IS_DEF = 2; // ress + flotte + def
const IS_BAT = 3;// ress + flotte + def + bat
const IS_TECH = 4;// on ne voit tout


function getDataRe($data,$columns,$price)
{
    $retour = 0;
    foreach ($columns as $column)
    {
        if ($data[$column] != '-1')
        {
            $retour+= floatval($data[$column]) * floatval($price[$column]);

        }
    }
    return numbers($retour);
}

function getPillage($data)
{
    $columns = array("metal","cristal","deuterium");
    $price["metal"] =1;
    $price["cristal"] = 1;
    $price["deuterium"] = 1;
    return getDataRe($data,$columns,$price);
}

function getflotteColumn()
{
    $columns = array("SAT","PT","GT","CLE","CLO","CR","VB","VC","REC","SE","BMD","DST","EDLM","TRA");
    return $columns;
}
function getflottePricewithoutDeut() // sans deut non recyclable
{
    $price = array();
    $price["PT"] = 2+2 ;
    $price["GT"] = 6+6;
    $price["CLE"] = 2 + 1 ;
    $price["CLO"] =6+4;
    $price["CR"] = 20+70;
    $price["VB"] = 45+15;
    $price["VC"] = 10+20;
    $price["REC"] = 10+60;
    $price["SE"] = 1 ;
    $price["BMD"] = 50+25;
    $price["DST"] = 60+50 ;
    $price["EDLM"] = 5000+4000 ;
    $price["TRA"] = 3040 ;
    $price["SAT"] = 2;

    return $price;
}

function getflotte($data)
{
    $columns = getflotteColumn();
    $price = getflottePricewithoutDeut();
    return getDataRe($data,$columns, $price);
}

function getDefColumn()
{
    $columns = array("LM","LLE","LLO","CG","AI","LP","PB","GB");
    return $columns;
}
function getDefPricewithoutDeut() // sans deut non recyclable
{
    $price = array();
    $price["LM"] = 2;
    $price["LLE"] = floatval(1.5)+floatval(0.5);
    $price["LLO"] =6+2 ;
    $price["CG"] = 20+15;
    $price["AI"] = 2+6;
    $price["LP"] = 50+50;
    $price["PB"] = 10+10 ;
    $price["GB"] = 50+50;

    return $price;
}


function getTechnoColumn()
{
    $columns = array("Esp","Ordi","Armes","Bouclier","Protection","Protection","NRJ","Hyp","RC","RI","PH","Laser","Ions","Plasma","RRI","Graviton","Astrophysique");
    return $columns;
}

function getBatColumn()
{
    $columns = array("M","C","D","CES","CEF","UdR","NRJ","UdN","CSp","HM","PH","HC","HD","Lab","Ter","DdR","Silo","BaLu","Pha","PoSa");
    return $columns;
}


function getDef($data)
{
    $columns = getDefColumn();
    $price = getDefPricewithoutDeut();
    return getDataRe($data,$columns, $price);
}

function visibility($data)
{
    $retour =IS_RES ; // par defaut
    // techno
    $column =  getTechnoColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_TECH;
    }
    $column =  getBatColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_BAT;
    }
    $column =  getDefColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_DEF;
    }
    $column =  getflotteColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_FLOTTE;
    }


    return $retour;
}

function isNotEmpty($data, $column)
{
    $retour = false;
    foreach ($column as $item)
    {
        if ((int)$data[$item] > 0)
        {
            return true;
        }
    }
    return $retour;
}



function numbers($nb)
{
    return number_format( (int)$nb,0,',','.' );
}


function reIsMoon($data)
{
 // si construction uniquement sur lune
        $tabIsMoon = array("BaLu","Pha","PoSa");
    foreach ($tabIsMoon as $elemPlanet)
    {
        if ((int)$data[$elemPlanet] > 0)
        {
            return true;
        }
    }
    // si construction uniquement sur planete
    $tabIsPlanete = array("M","C","D","CES","CEF","SAT");
      foreach ($tabIsPlanete as $elemPlanet)
    {
        if ((int)$data[$elemPlanet] > 0)
        {
            return false;
        }
    }
    // si pas de lune dans le ss
    if ($data["moon"] == "0")
    {
        return false;
    }

   // verification sur la concordance nom planete et nom dans ss
    if ($data["planet_name"] == $data["name"])
    {
        return false;

    }
    else
    {
        return true;
    }

}

function getGWithCoord($coord)
{
$tcoord = explode(":",$coord );
return $tcoord;
}

function reRowClean($tRow)
{
    $retour = array();
    foreach ($tRow as $k => $v)
    {
        $v= ($v =="-1") ? 0 : (int)$v;
        $v =  numbers( $v);
        $retour[$k]=$v;
    }
    return $retour;

}