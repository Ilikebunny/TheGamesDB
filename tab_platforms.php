<?php
include('helper/image.php');
include('helper/general.php');
include('modeles/modele_platform.php');
?>

<div id="gameHead">

    <?php include('snippets/errorsAndMessages.php'); ?>

    <h1>All Platforms</h1>

    <?php
    $recentResult = mysql_query(" SELECT p.* FROM platforms AS p ORDER BY p. name ASC ");
    $count = 1;
## Platform Items Display
    while ($recent = mysql_fetch_object($recentResult)) {
        ?>
        <div style=" width: 90%; padding: 16px; margin: 10px auto 20px auto; border-radius: 4px; border: 1px solid #4f4f4f; background-color: #333;">

            <?php
            $boxart = platform_getBoxart($recent->id);
            ?>

            <div style="height: 200px; float: left; padding-right: 12px; width: 202px; text-align: center;">
                <?php
                if ($boxart->filename != "") {
                    ?>
                    <img <?= imageResize("$baseurl/banners/$boxart->filename", "banners/_allplatformscache/$boxart->filename", 200) ?> alt="<?= $game->GameTitle ?> Boxart" style="border: 1px solid #666;"/>
                    <?php
                } else {
                    ?>
                    <img src="<?= $baseurl ?>/images/common/placeholders/boxart_blank.png" alt="<?= $game->GameTitle ?> Boxart"  style="width:140px; height: 200px; border: 1px solid #666;"/>
                    <?php
                }
                ?>
            </div>

            <span style="float: right; background-color: #333; padding: 6px; border-radius: 6px;">
                <?php
                $averageRating = platform_getAverageRating($recent->id);
                printRatingBar($averageRating);
                ?>
            </span>
            <?php
            $gameCount = platform_getGameCount($recent->id);
            ?>
            <h2><?= $count ?>:&nbsp;<img src="<?= $baseurl ?>/images/common/consoles/png24/<?= $recent->icon ?>" alt="<?= $recent->name ?>" style="vertical-align: -6px;" />&nbsp;<a style="color: orange; text-decoration: underline;" href="<?= $baseurl; ?>/platform/<?php
                if (!empty($recent->alias)) {
                    echo $recent->alias;
                } else {
                    echo $recent->id;
                }
                ?>/"><?= $recent->name ?></a>&nbsp;(<?= $gameCount ?> games)</h2>

            <p style="text-align: justify;"><?php
                if ($recent->overview != "") {
                    echo substr($recent->overview, 0, 410) . "...";
                } else {
                    echo "<br />No Overview Available...<br /><br />";
                }
                ?></p>

            <hr />

            <div>			
                <p style="text-align: center;"><a href="<?= $baseurl; ?>/platform/<?php
                    if (!empty($recent->alias)) {
                        echo $recent->alias;
                    } else {
                        echo $recent->id;
                    }
                    ?>/" style="color: orange;">View platform page</a>&nbsp;|&nbsp;<a href="<?= $baseurl ?>/browse/<?= $recent->id ?>/" style="color: orange;">View all games for <?= $recent->name ?></a></p>

                <hr />

                <p style="text-align: center;">
                    <?php
                    platform_getNumberImages($recent->id, $boxartResult, $fanartResult, $bannerResult);
                    ?>

                    <?php if ($boxartResult != 0) { ?>Boxart:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /> | <?php } else { ?>Boxart:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /> | <?php
                    }
                    if ($fanartResult != 0) {
                        ?>Fanart:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /> | <?php } else { ?>Fanart:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /> | <?php
                    }
                    if ($bannerResult != 0) {
                        ?>Banner:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /> | <?php } else { ?>Banner:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /> | <?php
                    }
                    if ($recent->console != "") {
                        ?>Console Art:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /> | <?php } else { ?>Console Art:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /> | <?php
                    }
                    if ($recent->controller != "") {
                        ?>Controller Art:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /> | <?php } else { ?>Controller Art:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /> | <?php
                    }
                    if ($recent->youtube != "") {
                        ?>Trailer:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/tick_16.png" alt="Yes" style="vertical-align: -3px;" /><?php } else { ?>Trailer:&nbsp;<img src="<?= $baseurl ?>/images/common/icons/cross_16.png" alt="No" style="vertical-align: -3px;" /><?php }
                    ?>
                </p>
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php
        $count++;
    }
    ?>

    <div style="clear: both;"></div>

</div>