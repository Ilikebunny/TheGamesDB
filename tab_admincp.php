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

        <div id="controlPanelWrapper">
            <?php include('tab_admincp_nav.php'); ?>
            
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
