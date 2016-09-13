<!DOCTYPE html >
<head>
    <meta charset= "UTF-8"/>

    <?php
## Redirect if no javascript
    if ($tab != "nojs") {
        print "<noscript><meta http-equiv=\"refresh\" content=\"0; url=$baseurl/nojs/\"/></noscript>\n";
    }
    ?>

    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="thegamesdb, the games db, games, database, meta, metadata, api, video, youtube, trailers, wallpapers, fanart, cover art, box art, fan art, open, source, game, search, forum, directory" />
    <meta name="language" content="en-US" />
    <meta name="description" content="TheGamesDB is an open, online database for video game fans. We are driven by a strong community to provide the best place to find information, covers, backdrops screenshots and videos for games, both modern and classic." />

    <title>TheGamesDB.net - An open, online database for video game fans</title>

    <link rel="shortcut icon" href="<?= $baseurl ?>/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="../../standard.css?ver=0008" />
    <link rel="stylesheet" type="text/css" href="../../style-v2.css?ver=0008" />

    <link rel="stylesheet" type="text/css" href="../../js/ckeditor/assets/output_xhtml.css" />
    <link rel="stylesheet" href="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/COLOURloversColorPicker.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../../js/jquery-ui/css/trontastic/jquery-ui-1.8.14.custom.css" type="text/css" media="all" />

    <!--Customs CSS-->
    <link rel="stylesheet" href="../../css/gdb_admin.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../../css/gdb_main.css" type="text/css" media="all" />

    <script type="text/JavaScript" src="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/js/COLOURloversColorPicker.js"></script>
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/JavaScript" src="../../js/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>

    <!-- Start AnythingSlider Include -->
    <link rel="stylesheet" href="../../js/anythingslider/css/anythingslider.css" type="text/css" media="all" />
    <script src="../../js/anythingslider/js/jquery.anythingslider.js" type="text/javascript"></script>
    <!-- End AnythingSlider Include -->

    <!-- Start FaceBox Include -->
    <link rel="stylesheet" href="../js/facebox/facebox.css" type="text/css" media="all" />
    <script src="../../js/facebox/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('a[rel*=facebox]').facebox()
        })
    </script>
    <!-- End FaceBox Include -->

    <!-- Start ShadowBox Include -->
    <link rel="stylesheet" href="../../js/shadowbox/shadowbox.css" type="text/css" media="all" />
    <script src="../../js/shadowbox/shadowbox.js" type="text/javascript"></script>
    <script type="text/javascript">
        Shadowbox.init({overlayOpacity: 0.85});
    </script>
    <!-- End ShadowBox Include -->

    <!-- Start Cufon Include -->
    <script src="../../js/cufon/cufon-yui.js" type="text/javascript"></script>
    <script src="../../js/cufon/arcade.font.js" type="text/javascript"></script>
    <script type="text/javascript">
        Cufon.replace('.arcade');
    </script>
    <!-- End Cufon Include -->


    <!-- Start jQuery Image Dropdown Include -->
    <link rel="stylesheet" type="text/css" href="../js/jqdropdown/dd.css" />
    <script src="../../js/jqdropdown/js/jquery.dd.js" type="text/javascript"></script>
    <!-- End jQuery Image Dropdown Include -->

    <!-- Start xFade2 Include -->
    <?php if (isset($tab) && ($tab == "game" || $tab == "game-edit")) { ?>
        <script src="../../js/xfade2/xfade2.js" type="text/javascript"></script>
    <?php } ?>
    <!-- End xFade2 Include -->

    <!-- Start jQuery Enabled CKEditor & CKFinder Include -->
    <script type="text/javascript" src="../../js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../../js/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="../../js/ckfinder/ckfinder.js"></script>
    <!-- End jQuery Enabled CKEditor & CKFinder Include -->

    <!-- Start Game View Page Scripts -->
    <?php if (isset($tab) && ($tab == "game" || $tab == "game-edit" || $tab == "platform" || $tab == "platform-edit")) { ?>
        <script type="text/javascript" src="../js/jqflip/jquery.flip.min.js"></script>

        <link rel="stylesheet" href="../js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
        <script type="text/javascript" src="../js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    <?php } ?>
    <!-- End Game View Page Scripts -->		

    <!-- Start Platform View Page Scripts -->
    <link type="text/css" rel="stylesheet" href="../js/theatre/theatre.css" />
    <script type="text/javascript" src="../js/theatre/jquery.theatre-1.0.js"></script>
    <!-- End Platform View Page Scripts -->

    <!-- Start Just Gage Scripts (Stats Page Gagues)  -->
    <?php if ($tab == "stats") { ?>
        <script type="text/javascript" src="../js/justgage/justgage.1.0.1.min.js"></script>
        <script type="text/javascript" src="../js/justgage/raphael.2.1.0.min.js"></script>
    <?php } ?>
    <!-- End Just Gage Scripts (Stats Page Gagues)  -->

    <!-- Start jQuery Snow Script -->
    <link rel="stylesheet" href="../js/jquery-snowfall/styles.css" type="text/css" media="all" />
    <script src="../js/jquery-snowfall/snowfall.min.jquery.js" type="text/javascript"></script>
    <!-- End jQuery Snow Script -->

    <?php
## Connect to the database
    include("js/core-js.php");
    ?>

</head>

<body>

    <?php
    include("templates/default/layout_frontHeader.php");
    ?>

    <?php
    include("templates/default/main_nav.php");
    ?>

    <div id="bannerShadow"></div>

    <div id="tinyHeader">			
        <div style="width: 100%; height: 35px; background: #000;">
            <div style="width: 1000px; margin: auto; background: #000 url(../images/header-tiny.png) no-repeat center left;">
                <form action="<?= $baseurl ?>/search/" style="width: 300px; display: inline;" autocomplete="off">
                    <input class="left ajaxSearch" type="text" name="string" style="color: #333; margin-left: 40px; margin-top: 5px; width: 190px;" />
                    <input type="hidden" name="function" value="Search" />
                    <input class="left" type="submit" value="Search" style="margin-top: 4px; margin-left: 4px; height: 24px;" />
                    <div class="ajaxSearchResults" style="top: 27px; width: 264px;"></div>
                </form>
                <a href="../" style="margin-left: 50px;"><img src="../images/tiny-logo-v2.png" alt="TheGamesDB.net" /></a>
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
        <div style="background: url(../images/bg_banner-shadow.png) repeat-x center center; height: 15px; width: 100%; z-index: 299; opacity: 0.5;"></div>
    </div>

    <div id="main">

        <div id="content">

            <?php if (isset($newlayout) && !$newlayout) { ?>
                <?php include('snippets/errorsAndMessages.php'); ?>
            <?php } ?>

            <div id="gameWrapper">
