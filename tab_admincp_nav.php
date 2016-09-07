<?php
// Fetch number of uploads to be moderated
$modQueueResult = mysql_query("SELECT id FROM moderation_uploads");
$modQueueCount = mysql_num_rows($modQueueResult);

// Fetch number of reported images to be moderated
$repQueueResult = mysql_query("SELECT id FROM moderation_reported");
$repQueueCount = mysql_num_rows($repQueueResult);
?>

<div id="controlPanelNav">
    <ul>
        <li<?php if ($cptab == "userinfo") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=userinfo">My User Info</a></li>
        <li<?php if ($cptab == "moderationqueue") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=moderationqueue&queuetype=frontboxart">Uploaded Images Moderation Queue</a><br /><a href="<?= $baseurl ?>/admincp/?cptab=moderationqueue" style="text-decoration: none;"><span style="padding: 3px 9px; font-weight: bold; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $modQueueCount ?></span></a></li>
        <li<?php if ($cptab == "reportedqueue") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue&queuetype=frontboxart">Reported Images/Games Moderation Queue</a><br /><a href="<?= $baseurl ?>/admincp/?cptab=reportedqueue" style="text-decoration: none;"><span style="padding: 3px 9px; font-weight: bold; background-color: orange; color: #444444; border: 1px soid #FFFFFF; border-radius: 5px;"><?= $repQueueCount ?></span></a></li>
        <li<?php if ($cptab == "addplatform") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=addplatform">Add New Platform</a></li>
        <li<?php if ($cptab == "addgenre") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=addgenre">Add New Genre</a></li>
        <li<?php if ($cptab == "publishers") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=pubdev">Manage Publishers &amp; Developers</a></li>
        <li<?php if ($cptab == "sendpm") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=sendpm">Send PM</a></li>
        <li<?php if ($cptab == "platformalias") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=platformalias">Generate Platform Alias's</a></li>
        <li<?php if ($cptab == "elasticsearchmanage") { ?> class="active" <?php } ?>><a href="<?= $baseurl ?>/admincp/?cptab=elasticsearchmanage">Manage ElasticSearch Index</a></li>
    </ul>
</div>

