<?php
if ($loggedin = 1 && $adminuserlevel == 'ADMINISTRATOR') {
    ##Image Resizing and caching script
    include('helper/image.php');

    if (!isset($cptab)) {
        $cptab = "userinfo";
    }
    ?>

    <div id="gameHead">

        <?php include('snippets/errorsAndMessages.php'); ?>

        <div>
            <h1>Admin Control Panel</h1>
            <p>&nbsp;</p>
        </div>

        <?php
        // Fetch number of uploads to be moderated
        $modQueueResult = mysql_query("SELECT id FROM moderation_uploads");
        $modQueueCount = mysql_num_rows($modQueueResult);

        // Fetch number of reported images to be moderated
        $repQueueResult = mysql_query("SELECT id FROM moderation_reported");
        $repQueueCount = mysql_num_rows($repQueueResult);
        ?>

        <div id="controlPanelWrapper">
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
            <div id="controlPanelContent">
                <?php
                switch ($cptab) {
                    case "userinfo":
                        include('tab_admincp_userinfo.php');
                        break;

                    case "moderationqueue":
                        include('tab_admincp_moderationqueue.php');
                        break;

                    case "reportedqueue":
                        include('tab_admincp_reportedqueue.php');
                        break;

                    case "addplatform":
                        include('tab_admincp_addplatform.php');
                        break;

                    case "addgenre":
                        include('tab_admincp_addgenre.php');
                        break;

                    case "pubdev":
                        include('tab_admincp_pubdev.php');
                        break;

                    case "sendpm":
                        include('tab_admincp_sendpm.php');
                        break;

                    case "platformalias":
                        include('tab_admincp_platformalias.php');
                        break;

                    case "elasticsearchmanage":
                        include('tab_admincp_elasticsearchmanage.php');
                        break;

                    default:
                        ?>
                        <p>&nbsp;</p>
                        <h2>Please select a section to administrate...</h2>
                        <p>&nbsp;</p>
                        <?php
                        break;
                }
                ?>
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php
    } else {
        ?>
        <div style="text-align: center;">
            <h2>Sorry...</h2>
            <h2>Only administrators are permitted access to this section.</h2>
        </div>
        <?php
    }
    ?>

</div>
