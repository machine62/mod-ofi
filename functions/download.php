<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2018
 * Time: 14:05
 */
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");

function getLatestSim()
{
    $urlSimJS = 'https://raw.githubusercontent.com/machine62/sim/master/sim.js';
    $destPath = 'mod/ofi/js/sim.js';
    $content = file_get_contents($urlSimJS);
    return     file_put_contents($destPath, $content);


}