<?php
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");
global $data;


$myLng = array();

$myLng['Esp'] = $lang['GAME_TECH_ESP'] ;
$myLng['Armes'] = $lang['GAME_TECH_WEAP'];
$myLng['Bouclier'] = $lang['GAME_TECH_SHIELD'];
$myLng['Protection'] = $lang['GAME_TECH_ARMOR'];
$myLng['GAME_TECH_ENERGY'] = 'Technologie Energie';
$myLng['RC'] = $lang['GAME_TECH_CD'] ;
$myLng['RI'] = $lang['GAME_TECH_ID'];
$myLng['PH'] = $lang['GAME_TECH_HD'];
$lang['GAME_BUILDING_SAT'] = $lang['GAME_FLEET_SAT'];

?>



<?php foreach ($data["re"] as $row): ?>
    <?php $cleanRow = reRowClean($row); ?>
    <div style="display: none;" id="infore_<?php echo $row["id_spy"] ?>" >
        <span class="infocontent">
            <table class="tableTimeobservatory" style="width:100%;">
              <tr>
                  <td colspan="2">
                      Ressources sur <?php echo $row["planet_name"]; ?> [<?php echo $row["coordinates"]; ?>
                      ] (joueur '<?php echo $row["player"]; ?>') <br/> Le <?php echo date('j-m-y à H:i:s', $row["dateRE"]); ?>
                      <br />
                      <a href="#"
                         onclick="window.open('index.php?action=show_reportspy&amp;galaxy=<?php echo explode(":", $row["coordinates"])[0]; ?>&amp;system=<?php echo explode(":", $row["coordinates"])[1]; ?>&amp;row=<?php echo explode(":", $row["coordinates"])[2]; ?>','_blank','width=640, height=480, toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=1, copyhistory=0, menuBar=0');return(false)">[Version Complete]</a>
                    </td>
              </tr>
             <tr>
                    <th  colspan="2">Ressources</th>
                </tr>
                <?php foreach (array("metal","cristal","deuterium","energie") as $res) : ?>
                       <tr>
                            <td><?php echo $res ;?></td>
                            <th><?php echo $cleanRow[$res]; ?></th>
                       </tr>
                 <?php endforeach ;?>
                <tr>
                      <th  colspan="2">flotte</th>
                </tr>
                 <?php foreach (getflotteColumn() as $flotte) : ?>
                     <?php if ($cleanRow[$flotte] > 0) : ?>
                         <tr>
                            <td><?php echo $lang['GAME_FLEET_'.$flotte];  ?></td>
                            <th><?php echo $cleanRow[$flotte]; ?></th>
                         </tr>
                     <?php endif ; ?>

                <?php endforeach ;?>
                <tr>
                    <th colspan="2">Défense</th>
                </tr>
                <?php foreach (getDefColumn() as $def) : ?>
                    <tr>
                        <td><?php echo $lang['GAME_DEF_'.$def];  ?></td>
                        <th><?php echo $cleanRow[$def]; ?></th>
                    </tr>
                <?php endforeach ;?>
                <tr>
                    <th colspan="2">Bâtiments</th>
                </tr>
                <?php if (reIsMoon($row)) :?>
                    <?php foreach (array("BaLu","Pha","PoSa") as $bat) : ?>
                        <tr>
                            <td><?php echo $lang['GAME_BUILDING_'.strtoupper($bat)]; ?></td>
                            <th><?php echo $cleanRow[$bat]; ?></th>
                       </tr>
                    <?php endforeach ;?>
                <?php else : ?>
                    <?php foreach (array("M","C","D","CES","CEF","SAT") as $bat) : ?>
                        <tr>
                            <td><?php echo $lang['GAME_BUILDING_'.$bat];  ?></td>
                            <th><?php echo $cleanRow[$bat]; ?></th>
                       </tr>
                       <?php endforeach ;?>
                    <?php endif ; ?>
                <tr>
                    <th colspan="2">Recherche</th>
                </tr>
                <?php foreach (array("Esp","Armes","Bouclier","Protection","RI","RC","PH") as $recherche) : ?>
                    <tr>
                            <td><?php echo $myLng[$recherche];  ?></td>
                            <th><?php echo $cleanRow[$recherche]; ?></th>
                       </tr>
                <?php endforeach ;?>
            </table>
<hr />

</span>
    </div>
    <div id="inforaid_<?php echo $row["id_spy"] ?>" style="display: none;">
    <span class="infocontent">
        <h1>inforaid : <?php echo $row["player"]; ?></h1>
        <p>Content 1</p>
        <p>content 2 </p>

    </span></div>
<?php endforeach; ?>
