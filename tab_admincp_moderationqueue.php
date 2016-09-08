
<?php
include('modeles/modele_moderation_uploads.php');

// Fetch number of uploads to be moderated
$frontQueueCount = get_QueueCount_front();
$backQueueCount = get_QueueCount_back();
$clearlogoQueueCount = get_QueueCount_clearlogo();
?>

<p>
    <a href="<?= $baseurl ?>/admincp/?cptab=moderationqueue&queuetype=frontboxart" style="color: orange; font-size: 16;">Front Boxart</a><span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $frontQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl ?>/admincp/?cptab=moderationqueue&queuetype=backboxart" style="color: orange; font-size: 16;">Rear Boxart</a><span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $backQueueCount ?></span>
    &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl ?>/admincp/?cptab=moderationqueue&queuetype=clearlogo" style="color: orange; font-size: 16;">ClearLOGO</a><span style="margin-left: 4px; padding: 1px 6px; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $clearlogoQueueCount ?></span>
</p>

<?php
if ($queuetype == "frontboxart") {
    $queueKey = 'front';
    $queueheader = "Front Boxart Moderation Queue";
} else if ($queuetype == "backboxart") {
    $queueKey = 'back';
    $queueheader = "Rear Boxart Moderation Queue";
} else if ($queuetype == "clearlogo") {
    $queueKey = 'clearlogo';
    $queueheader = "ClearLOGO Moderation Queue";
}
$modQueueResult = get_Queue_QueryResult($queueKey);
$modQueueCount = mysql_num_rows($modQueueResult);
?>

<table call-padding="0" cell-spacing="0" class="queue_admin_table">
    <thead style="text-align: left;">
        <tr>
            <th colspan="3" class="queue_admin_th_header"><?= $queueheader; ?></th>
        </tr>
        <tr>
            <th class = "queue_admin_th_head">Art</th>
            <th class = "queue_admin_th_head">Info</th>
            <th class = "queue_admin_th_head">Date</th>
        </tr>
    </thead>
    <tfoot style="text-align: left;">
        <tr>
            <th class = "queue_admin_th_foot">Art</th>
            <th class = "queue_admin_th_foot">Info</th>
            <th class = "queue_admin_th_foot">Date</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        if ($modQueueCount > 0) {
            while ($modQueueObject = mysql_fetch_object($modQueueResult)) {
                ?>
                <tr id="modItem-<?= $modQueueObject->id ?>">
                    <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top; text-align: center;">
                        <?php
                        if (!file_exists("moderationqueue/_cache/$modQueueObject->filename")) {
                            WideImage::load("moderationqueue/$modQueueObject->filename")->resize(200, 200)->saveToFile("moderationqueue/_cache/$modQueueObject->filename");
                        }
                        ?>
                        <a href="<?= "$baseurl/moderationqueue/$modQueueObject->filename" ?>" rel="facebox"><img src="<?= "$baseurl/moderationqueue/_cache/$modQueueObject->filename" ?>" /></a>
                    </td>
                    <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top;"><span style="font-weight: bold;">Game:</span> <a href="<?= $baseurl . "/game/" . $modQueueObject->gameID; ?>" style="color: darkorange;"><?= $modQueueObject->GameTitle; ?></a><br />
                        <span style="font-weight: bold;">Platform:</span> <a href="<?= $baseurl . "/platform/" . $modQueueObject->PlatformID; ?>" style="color: darkorange;"><?= $modQueueObject->PlatformName; ?></a><br />
                        <span style="font-weight: bold;">Filename:</span> <?= $modQueueObject->filename; ?> <br />
                        <span style="font-weight: bold;">Dimensions:</span> <?= $modQueueObject->resolution; ?>px<br />
                        <span style="font-weight: bold;">Uploader:</span> <a href="<?= $baseurl . "/artistbanners/?id=" . $modQueueObject->userID; ?>" style="color: darkorange;"><?= $modQueueObject->username; ?></a>
                        <p>&nbsp;</p>
                        <p style="text-align: right;"><button type="button" class="approve" onclick="$.get('<?= $baseurl; ?>/scripts/modqueue_approve.php?modID=<?= $modQueueObject->id; ?>', function (data) {
                                    if (data == 'Success') {
                                        $('#modItem-<?= $modQueueObject->id ?> img').css('display', 'none');
                                        $('#modItem-<?= $modQueueObject->id ?>').slideUp();
                                    } else {
                                        alert(data);
                                    }
                                });">Approve</button>&nbsp;&nbsp;<a class="compare" rel="facebox" href="<?= "$baseurl/scripts/modqueue_compare.php?modimageid=$modQueueObject->id" ?>">Compare</a>&nbsp;&nbsp;<button type="button" class="deny" onclick="$('#deny-<?= $modQueueObject->id ?>').slideToggle();">Deny</button></p>
                        <div id="deny-<?= $modQueueObject->id ?>" style="display: none;">
                            <hr />
                            <p style="font-weight: bold;">Reason for denial:</p>
                            <select id="deny-select-<?= $modQueueObject->id ?>">
                                <option>Submitted image is pixellated, of poor quality, or has artifacts.</option>
                                <option>Submitted image is of smaller dimensions than the current.</option>
                                <option>Submitted image does not possess a transparent background.</option>
                                <option>Submitted image is the incorrect type/category.</option>
                                <option>Submitted image is of an non-english language.</option>
                                <option>Submitted image is for the wrong platform.</option>
                                <option>Submitted image is for the wrong game.</option>
                                <option>Submitted image is heavily stained.</option>
                                <option>Submitted image is watermarked.</option>
                                <option>Other (specify in comments).</option>
                            </select>
                            <p style="font-weight: bold;">Additional comments:</p>
                            <textarea id="deny-additional-<?= $modQueueObject->id ?>" style="width: 100%; height: 100px;"></textarea>
                            <p style="text-align: center;"><a class="deny" href="javascript:void();" onclick="var reason = $('#deny-select-<?= $modQueueObject->id ?>').val();
                                    var additional = $('#deny-additional-<?= $modQueueObject->id ?>').val();
                                    $.get('<?= $baseurl; ?>/scripts/modqueue_deny.php?modID=<?= $modQueueObject->id; ?>&denyreason=' + reason + '&denyadditional=' + additional, function (data) {
                                        if (data == 'Success') {
                                            $('#modItem-<?= $modQueueObject->id ?> img').css('display', 'none');
                                            $('#modItem-<?= $modQueueObject->id ?>').slideUp();
                                        } else {
                                            alert(data);
                                        }
                                    });">Confirm Denial</a>
                            <!--<p style="text-align: center;"><a class="deny" href="javascript:void();" onclick="$.get('<?= $baseurl; ?>/scripts/modqueue_deny.php?modID=<?= $modQueueObject->id; ?>', function(data){ if(data == 'Success') { $('#modItem-<?= $modQueueObject->id ?> img').css('display', 'none'); $('#modItem-<?= $modQueueObject->id ?>').slideUp(); } else { alert(data); } });">Confirm Denial</a> -->
                        </div></td>
                    <td style="padding: 10px 10px; border-bottom: 1px solid #444; vertical-align: top;"><?= $modQueueObject->dateadded ?></td>
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
