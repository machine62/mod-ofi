<?php
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");
global $data;
$nb = 1;
?>
<div class="header">
    <h2>OFI </h2>


</div>
<div class="header">
    <h3>Formulaire de recherche</h3>
    <form method="post" action="#">
        <table>
            <tr>
                <td class="c" colspan="2">Galaxie</td>
                <td class="c" colspan="2">System</td>
                <td class="c" colspan="3">Recherche</td>
                <td class="c" colspan="2">Filtre</td>
                <td class="c" colspan="2"></td>

            </tr>
            <tr>
                <td class="c">
                    Min
                </td>
                <th>
                    <input type="text" maxlength="1" size="3" name="gmin" value="<?php echo $data["form"]["gmin"]; ?>"/>
                </th>
                <td class="c">
                    Min
                </td>
                <th>
                    <input type="text" maxlength="3" size="3" name="smin" value="<?php echo $data["form"]["smin"]; ?>"/>
                </th>
                <td class="c">
                    Joueur
                </td>
                <th>
                    <?php if ($data["form"]["isplayername"]): ?>
                        <input type="checkbox" name="isplayername" checked>
                    <?php else : ?>
                        <input type="checkbox" name="isplayername">
                    <?php endif; ?>
                </th>
                <th>
                    <?php if ($data["form"]["isplayername"]): ?>
                        <input type="text" size="30" name="playername"
                               value="<?php echo $data["form"]["playername"]; ?>"/>
                    <?php else : ?>
                        <input type="text" size="30" name="playername"/>
                    <?php endif; ?>
                </th>
                <td class="c">
                    Age RE (En jour)
                </td>
                <th>
                    <input type="input" size="3" name="dayre" value="<?php echo $data["form"]["dayre"]; ?>"/>
                </th>
                <td class="c">
                    Mes RE uniquement!
                </td>
                <th>
                    <input type="checkbox" name="isplayerre" <?php if ($data["form"]["isplayerre"]) {
                        echo " checked ";
                    } ?>>
                </th>
            </tr>
            <tr>
                <td class="c">
                    Max
                </td>
                <th>
                    <input type="text" maxlength="1" size="3" name="gmax" value="<?php echo $data["form"]["gmax"]; ?>"/>
                </th>
                <td class="c">
                    Max
                </td>
                <th>
                    <input type="text" maxlength="3" size="3" name="smax" value="<?php echo $data["form"]["smax"]; ?>"/>
                </th>

                <td class="c">
                    Alliance
                </td>
                <th>
                    <?php if ($data["form"]["isallyname"]): ?>
                        <input type="checkbox" name="isallyname" checked>
                    <?php else : ?>
                        <input type="checkbox" name="isallyname">
                    <?php endif; ?>
                </th>
                <th>
                    <?php if ($data["form"]["isallyname"]): ?>
                        <input type="text" size="30" name="allyname" value="<?php echo $data["form"]["allyname"]; ?>"/>
                    <?php else : ?>
                        <input type="text" size="30" name="allyname"/>
                    <?php endif; ?>
                </th>
                <td class="c">
                    Limite Réponse
                </td>
                <th>
                    <input type="text" size="3" name="limite" value="<?php echo $data["form"]["limite"]; ?>"/>
                </th>
                <th colspan="2">
                    <input type="submit" value="Envoyer"/>
                </th>
            </tr>
        </table>
</div>

<div>
    <h3>Résultat</h3>
    <table class="tableTimeobservatory">
        <theader>
            <tr>
                <th>

                </th>
                <th colspan="3">
                    coords
                </th>
                <th>
                    Acti
                </th>
                <th>
                    Timer
                </th>
                <th>
                    Date|Heure
                </th>
                <th>
                    Joueur
                </th>
                <th>
                    Alliance
                </th>

                <th>
                    Status
                </th>

                <th>
                    Ressources
                </th>
                <th>
                    Metal
                </th>
                <th>
                    cristal
                </th>
                <th>
                    Deut
                </th>
                <th>
                    Flotte
                </th>
                <?php foreach (getflotteColumn() as $f) : ?>
                    <th>
                        <?php echo $f ;?>
                    </th>
                <?php endforeach ; ?>
                <th>
                    Defense
                </th>
                <?php foreach (getDefColumn() as $d) : ?>
                    <th>
                        <?php echo $d ;?>
                    </th>
                <?php endforeach ; ?>
                <th colspan="3">
                    Actions
                </th>

            </tr>
        </theader>
        <tbody>
        <?php foreach ($data["re"] as $row): ?>
            <?php $cleanRow = reRowClean($row); ?>
            <tr class="idspy_<?php echo $row["id_spy"] ?> timeobstr" id_spy="<?php echo $row["id_spy"] ?>">
                <th>
                    <?php echo $nb; ?>
                    <?php $nb++; ?>
                </th>
                <td class="coord">
                    <?php echo $row["coordinates"]; ?>
                </td>
                <td>
                    <?php if (reIsMoon($row)): ?>
                        M
                    <?php else : ?>
                        P
                    <?php endif; ?>
                </td>
                <?php $visibility = visibility($row) ;?>
                <td class ="quality_<?php echo $visibility; ?>">
                    <?php
                    switch($visibility)
                    {
                        case IS_RES:
                            echo "*";
                            break;
                        case IS_FLOTTE:
                            echo "**";
                            break;
                        case IS_DEF:
                            echo "***";
                            break;
                        case IS_BAT:
                            echo "****";
                            break;
                        case IS_TECH:
                            echo "*****";
                            break;
                    }
                   ?>
                </td>
                <td class="acti">
                    <?php if ($row["activite"] == "0"): ?>

                    <?php else : ?>
                        <?php echo $row["activite"]; ?>
                    <?php endif; ?>

                </td>


                <?php $sincetime = time() - (int)$row["dateRE"]; ?>
                <td class="syncTimestamp" data="<?php echo $sincetime; ?>">

                </td>
                <td class="Timestamp">
                    <?php echo date('j-m-y | H:i:s', $row["dateRE"]); ?>
                </td>
                <td class="player">
                    <?php echo $row["player"]; ?>
                </td>
                <td class="ally">
                    <?php echo $row["ally"]; ?>
                </td>
                <td>
                    <?php echo $row["status"]; ?>
                </td>
                <td class="pillage">
                    <?php echo getPillage($row); ?>
                </td>
                <td>
                    <?php echo $cleanRow["metal"] ;?>
                </td>
                <td>
                    <?php echo $cleanRow["cristal"] ;?>
                </td>
                <td>
                    <?php echo $cleanRow["deuterium"] ;?>
                </td>
                <td class="flotte">
                    <?php echo getFlotte($row); ?>
                </td>
                <?php foreach (getflotteColumn() as $f) : ?>
                    <td>
                        <?php echo $cleanRow[$f] ;?>
                    </td>
                <?php endforeach ; ?>
                <td class="def">
                    <?php echo getDef($row); ?>
                </td>
                <?php foreach (getDefColumn() as $d) : ?>
                    <td>
                        <?php echo $cleanRow[$d] ;?>
                    </td>
                <?php endforeach ; ?>
                <td class="img">
                    <img class="imgview" src="./mod/timeobservatory/img/voir.png"/>
                </td>
                <td class="img">
                    <img class="imghide" src="./mod/timeobservatory/img/hide.png"/>
                </td>
                <td class="img">
                    <img class="imgdelete" id_spy="<?php echo $row["id_spy"] ?>"
                         src="./mod/timeobservatory/img/delete.png"/>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
</div>

<?php  var_dump($data["re"]); ?>

<div id="currentre" class="info infore">
        <span class="infocontent">
          info re
        </span>
</div>
<!--
<div id="currentraid" class="info inforaid" style="">
    <span class="infocontent">


    </span></div>
    -->




<!--<p>Même si ton adversaire te semble une souris, surveille-le comme s'il était un lion</p>-->
