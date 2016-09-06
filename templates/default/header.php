<!DOCTYPE html >
<meta charset= "UTF-8"/>
<?php
## Redirect if no javascript
if ($tab != "nojs") {
    print "<noscript><meta http-equiv=\"refresh\" content=\"0; url=$baseurl/nojs/\"/></noscript>\n";
}
?>
<title>TheGamesDB.net - An open, online database for video game fans</title>

<meta name="robots" content="index, follow" />
<meta name="keywords" content="thegamesdb, the games db, games, database, meta, metadata, api, video, youtube, trailers, wallpapers, fanart, cover art, box art, fan art, open, source, game, search, forum, directory" />
<meta name="language" content="en-US" />
<meta name="description" content="TheGamesDB is an open, online database for video game fans. We are driven by a strong community to provide the best place to find information, covers, backdrops screenshots and videos for games, both modern and classic." />

<link rel="shortcut icon" href="<?= $baseurl ?>/favicon.ico" />

<link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>/standard.css?ver=0008" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>/style-v2.css?ver=0008" />

<link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>/js/ckeditor/assets/output_xhtml.css" />
<link rel="stylesheet" href="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/COLOURloversColorPicker.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/js/jquery-ui/css/trontastic/jquery-ui-1.8.14.custom.css" type="text/css" media="all" />

<script type="text/JavaScript" src="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/js/COLOURloversColorPicker.js"></script>
<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/JavaScript" src="<?php echo $baseurl; ?>/js/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>

<!-- Start AnythingSlider Include -->
<link rel="stylesheet" href="<?php echo $baseurl; ?>/js/anythingslider/css/anythingslider.css" type="text/css" media="all" />
<script src="<?php echo $baseurl; ?>/js/anythingslider/js/jquery.anythingslider.js" type="text/javascript"></script>
<!-- End AnythingSlider Include -->

<!-- Start FaceBox Include -->
<link rel="stylesheet" href="<?php echo $baseurl; ?>/js/facebox/facebox.css" type="text/css" media="all" />
<script src="<?php echo $baseurl; ?>/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('a[rel*=facebox]').facebox()
    })
</script>
<!-- End FaceBox Include -->

<!-- Start ShadowBox Include -->
<link rel="stylesheet" href="<?php echo $baseurl; ?>/js/shadowbox/shadowbox.css" type="text/css" media="all" />
<script src="<?php echo $baseurl; ?>/js/shadowbox/shadowbox.js" type="text/javascript"></script>
<script type="text/javascript">
    Shadowbox.init({overlayOpacity: 0.85});
</script>
<!-- End ShadowBox Include -->

<!-- Start Cufon Include -->
<script src="<?php echo $baseurl; ?>/js/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo $baseurl; ?>/js/cufon/arcade.font.js" type="text/javascript"></script>
<script type="text/javascript">
    Cufon.replace('.arcade');
</script>
<!-- End Cufon Include -->


<!-- Start jQuery Image Dropdown Include -->
<link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>/js/jqdropdown/dd.css" />
<script src="<?php echo $baseurl; ?>/js/jqdropdown/js/jquery.dd.js" type="text/javascript"></script>
<!-- End jQuery Image Dropdown Include -->

<!-- Start xFade2 Include -->
<?php if (isset($tab) && ($tab == "game" || $tab == "game-edit")) { ?>
    <script src="<?php echo $baseurl; ?>/js/xfade2/xfade2.js" type="text/javascript"></script>
<?php } ?>
<!-- End xFade2 Include -->

<!-- Start jQuery Enabled CKEditor & CKFinder Include -->
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/ckfinder/ckfinder.js"></script>
<!-- End jQuery Enabled CKEditor & CKFinder Include -->

<!-- Start Game View Page Scripts -->
<?php if (isset($tab) && ($tab == "game" || $tab == "game-edit" || $tab == "platform" || $tab == "platform-edit")) { ?>
    <script type="text/javascript" src="<?php echo $baseurl; ?>/js/jqflip/jquery.flip.min.js"></script>

    <link rel="stylesheet" href="<?php echo $baseurl; ?>/js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo $baseurl; ?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
<?php } ?>
<!-- End Game View Page Scripts -->		

<!-- Start Platform View Page Scripts -->
<link type="text/css" rel="stylesheet" href="<?php echo $baseurl; ?>/js/theatre/theatre.css" />
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/theatre/jquery.theatre-1.0.js"></script>
<!-- End Platform View Page Scripts -->

<!-- Start Just Gage Scripts (Stats Page Gagues)  -->
<?php if ($tab == "stats") { ?>
    <script type="text/javascript" src="<?php echo $baseurl; ?>/js/justgage/justgage.1.0.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseurl; ?>/js/justgage/raphael.2.1.0.min.js"></script>
<?php } ?>
<!-- End Just Gage Scripts (Stats Page Gagues)  -->

<!-- Start jQuery Snow Script -->
<link rel="stylesheet" href="<?php echo $baseurl; ?>/js/jquery-snowfall/styles.css" type="text/css" media="all" />
<script src="<?php echo $baseurl; ?>/js/jquery-snowfall/snowfall.min.jquery.js" type="text/javascript"></script>
<!-- End jQuery Snow Script -->

<?php
## Connect to the database
include("js/core-js.php");
?>

</head>

<body style="overflow-x:hidden;">

    <div id="frontHeader" style="height: 78px; position: absolute; top: 0px; left: 0px; width: 100%; z-index: 300; background: url(/images/bg_bannerws-thin.png) repeat-x center center; box-shadow: 0px 0px 6px 0px #000;">
        <div id="frontBanner" style="width: 880px; margin: auto;">
            <p style="position: absolute; top: 10px; right: 15px; font-family:Arial; font-size:10pt; margin: 0px; padding: 0px;">
                <?php
                if ($loggedin) {
                    $msgQuery = mysql_query(" SELECT id FROM messages WHERE status = 'new' AND messages.to = '$user->id' ");
                    $msgCount = mysql_num_rows($msgQuery);
                    ?><a href="<?= $baseurl ?>/messages/">Messages</a> <?php
                    if ($msgCount > 0) {
                        echo"<span style=\"color: Chartreuse;\">($msgCount)</span>";
                    } else {
                        echo "($msgCount)";
                    }
                    ?> <span style="color: #ccc;">|</span> <a href="<?= $baseurl ?>/favorites/">Favorites</a> <span>(<?php
                    if ($user->favorites != "") {
                        echo count(explode(",", $user->favorites));
                    } else {
                        echo "0";
                    }
                    ?>)</span> <span style="color: #ccc;">|</span> <?php if ($adminuserlevel == 'ADMINISTRATOR') { ?> <a href="<?= $baseurl ?>/admincp/">Admin Control Panel</a> <?php } else { ?><a href="<?= $baseurl ?>/userinfo/">My User Info</a><?php } ?> <span style="color: #ccc;">|</span> <a href="<?= $baseurl ?>/?function=Log Out">Logout</a>
                    <?php } else { ?>
                    <a href="<?= $baseurl ?>/login/?redirect=<?= urlencode($_SERVER["REQUEST_URI"]) ?>">Login</a> <span style="color: #ccc;">|</span> New to the site? <a href="<?= $baseurl ?>/register/">Register here!</a>
                <?php } ?>
            </p>
            <a href="<?php echo $baseurl; ?>/" title="An open database of video games">
                <img src="<?php echo $baseurl; ?>/images/bannerws-thin-glass-v2.png" style="border-width: 0px; padding: 12px 125px" />
            </a>
        </div>
    </div>
    
    <?php
    include("templates/default/main_nav.php");
    ?>

    <div style=" display: none; position: absolute; top: 113px; background: url(<?php echo $baseurl; ?>/images/bg_banner-shadow.png) repeat-x center center; height: 15px; width: 100%; z-index: 200; opacity: 0.5;"></div>

    <div id="tinyHeader" style="position: fixed; width: 100%; left: 0px; top: 0px; height: 50px; z-index: 299;">			
        <div style="width: 100%; height: 35px; background: #000;">
            <div style="width: 1000px; margin: auto; background: #000 url(<?php echo $baseurl; ?>/images/header-tiny.png) no-repeat center left;">
                <form action="<?= $baseurl ?>/search/" style="width: 300px; display: inline;" autocomplete="off">
                    <input class="left ajaxSearch" type="text" name="string" style="color: #333; margin-left: 40px; margin-top: 5px; width: 190px;" />
                    <input type="hidden" name="function" value="Search" />
                    <input class="left" type="submit" value="Search" style="margin-top: 4px; margin-left: 4px; height: 24px;" />
                    <div class="ajaxSearchResults" style="top: 27px; width: 264px;"></div>
                </form>
                <a href="<?php echo $baseurl; ?>/" style="margin-left: 50px;"><img src="<?php echo $baseurl; ?>/images/tiny-logo-v2.png" alt="TheGamesDB.net" /></a>
                <p style="position: absolute; top: 10px; right: 15px; font-family:Arial; font-size:10pt; margin: 0px; padding: 0px;">
                    <?php if ($loggedin) {
                        ?><a href="<?= $baseurl ?>/messages/">Messages</a> <?php
                        if ($msgCount > 0) {
                            echo"<span style=\"color: Chartreuse;\">($msgCount)</span>";
                        } else {
                            echo "($msgCount)";
                        }
                        ?> <span style="color: #ccc;">|</span> <a href="<?= $baseurl ?>/favorites/">Favorites</a> <span>(<?php
                        if ($user->favorites != "") {
                            echo count(explode(",", $user->favorites));
                        } else {
                            echo "0";
                        }
                        ?>) <span style="color: #ccc;">|</span> <?php if ($adminuserlevel == 'ADMINISTRATOR') { ?> <a href="<?= $baseurl ?>/admincp/">Admin Control Panel</a> <?php } else { ?><a href="<?= $baseurl ?>/userinfo/">My User Info</a><?php } ?> <span style="color: #ccc;">|</span> <a href="<?= $baseurl ?>/?function=Log Out">Logout</a>
                        <?php } else { ?>
                            <a href="<?= $baseurl ?>/login/?redirect=<?= urlencode($_SERVER["REQUEST_URI"]) ?>">Login</a> <span style="color: #ccc;">|</span> New to the site? <a href="<?= $baseurl ?>/register/">Register here!</a>
                        <?php } ?>
                </p>
            </div>
        </div>
        <div style="background: url(<?php echo $baseurl; ?>/images/bg_banner-shadow.png) repeat-x center center; height: 15px; width: 100%; z-index: 299; opacity: 0.5;"></div>
    </div>

    <div id="main">

        <div id="content">

            <?php if (isset($newlayout) && !$newlayout) { ?>
                <?php if (!empty($errormessage)): ?>
                    <div class="error"><?= $errormessage ?></div>
                <?php endif; ?>
                <?php if (!empty($message)): ?>
                    <div class="message"><?= $message ?></div>
                <?php endif; ?>
            <?php } ?>

            <div id="gameWrapper">
