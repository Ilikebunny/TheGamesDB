
<?php
// Fetch number of reported images to be moderated
//Front Boxart
$reportedFrontQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'boxart' AND b.filename LIKE '%front%'");
$reportedFrontQueueCount = mysql_num_rows($reportedFrontQueueResult);

//Rear Boxart
$reportedRearQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'boxart' AND b.filename LIKE '%back%'");
$reportedRearQueueCount = mysql_num_rows($reportedRearQueueResult);

//ClearLOGO
$reportedClearlogoQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'clearlogo'");
$reportedClearlogoQueueCount = mysql_num_rows($reportedClearlogoQueueResult);

//Fanart
$reportedFanartQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'fanart'");
$reportedFanartQueueCount = mysql_num_rows($reportedFanartQueueResult);

//Screenshot
$reportedScreenshotQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'screenshot'");
$reportedScreenshotQueueCount = mysql_num_rows($reportedScreenshotQueueResult);

//Banner
$reportedBannerQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND b.keytype = 'series'");
$reportedBannerQueueCount = mysql_num_rows($reportedBannerQueueResult);

//Games
$reportedGameQueueResult = mysql_query("SELECT m.id FROM moderation_reported AS m, games AS g WHERE m.reportid = g.id AND m.reporttype = 'game'");
$reportedGameQueueCount = mysql_num_rows($reportedGameQueueResult);
?>

<p>
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=frontboxart" style="color: orange; font-size: 16;">Front Boxart</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedFrontQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=rearboxart" style="color: orange; font-size: 16;">Rear Boxart</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedRearQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=clearlogo" style="color: orange; font-size: 16;">ClearLOGO</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedClearlogoQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=fanart" style="color: orange; font-size: 16;">Fanart</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedFanartQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=screenshot" style="color: orange; font-size: 16;">Screenshot</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedScreenshotQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=banner" style="color: orange; font-size: 16;">Banner</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedBannerQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=game" style="color: orange; font-size: 16;">Game</a>
    <span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $reportedGameQueueCount ?></span>
</p>

<?php
switch ($queuetype) {
    case "frontboxart":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'boxart' AND b.filename LIKE '%front%' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Front Boxart Queue";
        break;

    case "rearboxart":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'boxart' AND b.filename LIKE '%back%' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Rear Boxart Queue";
        break;

    case "clearlogo":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'clearlogo' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported ClearLOGO Queue";
        break;

    case "fanart":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'fanart' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Fanart Queue";
        break;

    case "screenshot":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'screenshot' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Screenshot Queue";
        break;

    case "banner":
        $reportedResult = mysql_query("SELECT m.*, u.username, b.filename, b.resolution, g.id AS gameID, g.GameTitle, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p, banners AS b WHERE m.reportid = b.id AND m.reporttype = 'image' AND m.userID = u.id AND b.keyvalue = g.id AND g.Platform = p.id AND b.keytype = 'series' ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Banner Queue";
        break;

    case "game":
        $reportedResult = mysql_query("SELECT m.*, u.username, g.id AS gameID, g.GameTitle, g.Developer, g.Publisher, g.ReleaseDate, g.Overview, p.name AS PlatformName, p.id AS PlatformID FROM moderation_reported AS m, users AS u, games AS g, platforms AS p WHERE m.reportid = g.id AND m.reporttype = 'game' AND m.userID = u.id AND g.Platform = p.id ORDER BY m.dateadded") or die(mysql_error());
        $queueheader = "Reported Game Queue";
        break;
}

$reportedCount = mysql_num_rows($reportedResult);
?>

<table call-padding="0" cell-spacing="0" style="border: 2px solid #444; border-radius: 6px; background-color: #EEEEEE; color: #333333; border-collapse: separate; border-spacing: 2px; border-color: gray; width: 100%;">
    <thead style="text-align: left;">
        <tr>
            <th colspan="3" style="background: #F1F1F1; background-image: -webkit-linear-gradient(bottom,#C5C5C5,#F9F9F9); padding: 7px 7px 8px; font-size: 18px; text-align: center; border-bottom: 1px solid #444;"><?= $queueheader; ?></th>
        </tr>
        <tr>
            <?php if ($queuetype == "game") { ?>
                <th class="modTableTitle">Game</th>
                <th class="modTableTitle">Report Info</th>
            <?php } else { ?>
                <th class="modTableTitle">Art</th>
                <th class="modTableTitle">Art Info</th>
                <th class="modTableTitle">Report Info</th>
            <?php } ?>
        </tr>
    </thead>
    <tfoot style="text-align: left;">
        <tr>
            <?php if ($queuetype == "game") { ?>
                <th class="modTableTitle">Game</th>
                <th class="modTableTitle">Report Info</th>
            <?php } else { ?>
                <th class="modTableTitle">Art</th>
                <th class="modTableTitle">Art Info</th>
                <th class="modTableTitle">Report Info</th>
            <?php } ?>
        </tr>
    </tfoot>
    <tbody>
        <?php
        if ($reportedCount > 0) {
            while ($reportedObject = mysql_fetch_object($reportedResult)) {
                ?>
                <tr id="modItem-<?= $reportedObject->id ?>">
                    <?php if ($queuetype != "game") { ?>
                        <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top; text-align: center;">
                            <?php
                            if (!file_exists("reportedqueue/_cache/$reportedObject->filename")) {
                                WideImage::load("banners/$reportedObject->filename")->resize(200, 200)->saveToFile("reportedqueue/_cache/$reportedObject->filename");
                            }
                            ?>
                            <a href="<?= "$baseurl/banners/$reportedObject->filename" ?>" rel="facebox"><img src="<?= "$baseurl/reportedqueue/_cache/$reportedObject->filename" ?>" /></a>
                        </td>
                    <?php } ?>
                    <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top;"><span style="font-weight: bold;">Game:</span> <a href="<?= $baseurl . "/game/" . $reportedObject->gameID; ?>" style="color: darkorange;"><?= $reportedObject->GameTitle; ?></a><br />
                        <span style="font-weight: bold;">Platform:</span> <a href="<?= $baseurl . "/platform/" . $reportedObject->PlatformID; ?>" style="color: darkorange;"><?= $reportedObject->PlatformName; ?></a><br />

                        <?php if ($queuetype != "game") { ?>
                            <span style="font-weight: bold;">Filename:</span> <?= $reportedObject->filename; ?> <br />
                            <span style="font-weight: bold;">Dimensions:</span> <?
                            if (!empty($reportedObject->resolution)) {
                                echo $reportedObject->resolution . "px";
                            } else {
                                echo "N/A";
                            }
                            ?>
                        <?php } else { ?>
                            <span style="font-weight: bold;">Developer:</span> <?
                            if (!empty($reportedObject->Developer)) {
                                echo $reportedObject->Developer;
                            } else {
                                echo "N/A";
                            }
                            ?><br/>
                            <span style="font-weight: bold;">Publisher:</span> <?
                            if (!empty($reportedObject->Publisher)) {
                                echo $reportedObject->Publisher;
                            } else {
                                echo "N/A";
                            }
                            ?><br/>
                            <span style="font-weight: bold;">Release Date:</span> <?
                            if (!empty($reportedObject->ReleaseDate)) {
                                echo $reportedObject->ReleaseDate;
                            } else {
                                echo "N/A";
                            }
                            ?><br/>
                            <span style="font-weight: bold;">Overview:</span> <?
                            if (!empty($reportedObject->Overview)) {
                                echo "<div style=\"border: 1px solid #999; margin: 4px; padding: 4px; width: 100%; height: 150px; overflow: auto;\">" . nl2br(strip_tags($reportedObject->Overview)) . "</div>";
                            } else {
                                echo "N/A";
                            }
                            ?>
                        <?php } ?>
                        <p style="text-align: right;">
                            <?php
                            $type = "image";
                            if ($queuetype == "game")
                                $type = "game";
                            ?>
                            <button type="button" class="approve" onclick="$.get('<?= $baseurl; ?>/scripts/reportqueue_keep.php?reportType=<?= $type; ?>&reportedID=<?= $reportedObject->reportid; ?>&reportID=<?= $reportedObject->id; ?>', function (data) {
                                        if (data.indexOf('Success') >= 0) {
                                            $('#modItem-<?= $reportedObject->id ?> img').css('display', 'none');
                                            $('#modItem-<?= $reportedObject->id ?>').slideUp();
                                        } else {
                                            alert(data);
                                        }
                                    });">Keep</button>&nbsp;&nbsp;
                            <button type="button" class="deny" onclick="$.get('<?= $baseurl; ?>/scripts/reportqueue_delete.php?reportType=<?= $type; ?>&reportedID=<?= $reportedObject->reportid; ?>&reportID=<?= $reportedObject->id; ?>', function (data) {
                                        if (data.indexOf('Success') >= 0) {
                                            $('#modItem-<?= $reportedObject->id ?> img').css('display', 'none');
                                            $('#modItem-<?= $reportedObject->id ?>').slideUp();
                                        } else {
                                            alert(data);
                                        }
                                    });">Delete</button>
                        </p>
                        <div id="deny-<?= $reportedObject->id ?>" style="display: none;">
                            <hr />
                            <p style="font-weight: bold;">Reason for denial:</p>
                            <select id="deny-select-<?= $reportedObject->id ?>">
                                <option>Submitted image is pixellated, of poor quality, or has artifacts.</option>
                                <option>Submitted image is of smaller dimensions than the current.</option>
                                <option>Submitted image does not possess a transparent background.</option>
                                <option>Submitted image is of an non-english language.</option>
                                <option>Submitted image is for the wrong platform.</option>
                                <option>Submitted image is for the wrong game.</option>
                                <option>Submitted image is heavily stained.</option>
                                <option>Submitted image contains offensive material such as gross violence or nudity.</option>
                                <option>Submitted image is not related to the game.</option>
                            </select>
                            <p style="font-weight: bold;">Additional comments:</p>
                            <textarea id="deny-additional-<?= $reportedObject->id ?>" style="width: 100%; height: 100px;"></textarea>
                            <p style="text-align: center;"><a class="deny" href="javascript:void();" onclick="var reason = $('#deny-select-<?= $reportedObject->id ?>').val();
                                    var additional = $('#deny-additional-<?= $reportedObject->id ?>').val();
                                    $.get('<?= $baseurl; ?>/scripts/modqueue_deny.php?modID=<?= $reportedObject->id; ?>&denyreason=' + reason + '&denyadditional=' + additional, function (data) {
                                        if (data == 'Success') {
                                            $('#modItem-<?= $reportedObject->id ?> img').css('display', 'none');
                                            $('#modItem-<?= $reportedObject->id ?>').slideUp();
                                        } else {
                                            alert(data); } });">Confirm Denial</a>
                            <!--<p style="text-align: center;"><a class="deny" href="javascript:void();" onclick="$.get('<?= $baseurl; ?>/scripts/modqueue_deny.php?modID=<?= $reportedObject->id; ?>', function(data){ if(data == 'Success') { $('#modItem-<?= $reportedObject->id ?> img').css('display', 'none'); $('#modItem-<?= $reportedObject->id ?>').slideUp(); } else { alert(data); } });">Confirm Denial</a> -->
                        </div></td>
                    <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top; width: 30%;">
                        <span style="font-weight: bold;">Date Reported:</span><br /><?= $reportedObject->dateadded ?><br />
                        <span style="font-weight: bold;">Reported By:</span><br /><a href="<?= $baseurl . "/artistbanners/?id=" . $reportedObject->userid; ?>" style="color: darkorange;"><?= $reportedObject->username; ?></a><br />
                        <span style="font-weight: bold;">Reason For Report:</span><br /><?= $reportedObject->reason ?><br />
                        <span style="font-weight: bold;">Additional:</span><br /><?
                        if (!empty($reportedObject->additional)) {
                            echo $reportedObject->additional;
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="3" style="padding: 10px 10px; font-size: 18px; text-align: center;">This moderation queue is empty.</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>