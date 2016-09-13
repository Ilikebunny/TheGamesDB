<!DOCTYPE html >
<head>
    <meta charset="UTF-8"/>

    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="thegamesdb, the games db, games, database, meta, metadata, api, video, youtube, trailers, wallpapers, fanart, cover art, box art, fan art, open, source, game, search, forum," />
    <meta name="language" content="en-US" />
    <meta name="description" content="TheGamesDB is an open, online database for video game fans. We are driven by a strong community to provide the best place to find information, covers, backdrops screenshots and videos for games, both modern and classic." />

    <title>TheGamesDB.net - An open, online database for video game fans</title>

    <link rel="shortcut icon" href="<?= $baseurl ?>/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="../js/fullscreenslider/css/style.css"/>
    <link rel="stylesheet" href="../js/jquery-ui/css/trontastic/jquery-ui-1.8.14.custom.css" type="text/css" media="all" />
    <!--Customs CSS-->
    <link rel="stylesheet" href="../css/gdb_firstPage.css" type="text/css" media="all" />
    <!--JS-->
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="../js/fullscreenslider/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="../js/fullscreenslider/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/fullscreenslider/js/script.js"></script>
    <script type="text/JavaScript" src="../js/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>

    <!-- Start FaceBox Include -->
    <link rel="stylesheet" href="../js/facebox/facebox.css" type="text/css" media="all" />
    <script src="../js/facebox/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox()
        })
    </script>
    <!-- End FaceBox Include -->

    <!-- Start jQuery Snow Script -->
    <link rel="stylesheet" href="../js/jquery-snowfall/styles.css" type="text/css" media="all" />
    <script src="../js/jquery-snowfall/snowfall.min.jquery.js" type="text/javascript"></script>
    <!-- End jQuery Snow Script -->

    <?php
    $sql = "SELECT g.GameTitle, p.name, p.id AS platformid, p.icon, g.id, b.filename FROM games AS g, banners AS b, platforms AS p, ratings AS r WHERE r.itemid = b.id AND g.id = b.keyvalue AND r.itemtype = 'banner' AND b.keytype = 'fanart' AND g.platform = p.id GROUP BY g.GameTitle, p.name, g.id, b.filename    HAVING AVG(r.rating) = 10 ORDER BY RAND() LIMIT 6";
    $result = mysql_query($sql);
    if ($result !== FALSE) {
        $rows = mysql_num_rows($result);
        ?>
        <script type="text/javascript">
        var photos = [
    <?php
    $colours = array("orange", "blue", "purple", "green", "red", "yellow");
    $colourCount = 0;
    $gameRowCount = 0;
    $imageUrls = array();

// Include JPEG Reducer Class
    include('simpleimage50.php');

    while ($game = mysql_fetch_object($result)) {

        // Get Game Rating
        $ratingquery = "SELECT AVG(rating) AS average, count(*) AS count FROM ratings WHERE itemtype='game' AND itemid=$game->id";
        $ratingresult = mysql_query($ratingquery) or die('Query failed: ' . mysql_error());
        $rating = mysql_fetch_object($ratingresult);

        if ($gameRowCount != $rows - 1) {
            // Recompress Fanart to 50% Jpeg Quality and save to front page image cache
            if (!file_exists("banners/_frontcache/$game->filename")) {
                $image = new SimpleImage();
                $image->load("banners/$game->filename");
                $image->save("banners/_frontcache/$game->filename");
            }

            $imageUrls[] = "banners/_frontcache/$game->filename";
            ?>
                {
                "title" : "<?= $game->GameTitle ?>",
                        "cssclass" : "<?= $colours[$colourCount] ?>",
                        "image" : "banners/_frontcache/<?= $game->filename ?>",
                        "text" : "<?= $game->name ?>",
                        "icon" : "<?= $game->icon; ?>",
                        "platformid" : "<?= $game->platformid; ?>",
                        "rating" : "<?php
            for ($i = 2; $i <= 10; $i = $i + 2) {
                if ($i <= $rating->average) {
                    print '<img src=\'images/game/star_on.png\' width=15 height=15 border=0>';
                } else if ($rating->average > $i - 2 && $rating->average < $i) {
                    print '<img src=\'images/game/star_half.png\' width=15 height=15 border=0>';
                } else {
                    print '<img src=\'images/game/star_off.png\' width=15 height=15 border=0>';
                }
            }
            ?>",
                        "url" : '<?= $baseurl; ?>/game/<?= $game->id ?>/',
                        "urltext" : 'View Game'
                },
            <?php
            if ($colourCount != 5) {
                $colourCount++;
            } else {
                $colourCount = 0;
            }
            $gameRowCount++;
        } else {
            // Recompress Fanart to 50% Jpeg Quality and save to front page image cache
            if (!file_exists("banners/_frontcache/$game->filename")) {
                $image = new SimpleImage();
                $image->load("banners/$game->filename");
                $image->save("banners/_frontcache/$game->filename");
            }

            $imageUrls[] = "banners/_frontcache/$game->filename";
            ?>
                {
                "title" : "<?= $game->GameTitle ?>",
                        "cssclass" : "<?= $colours[$colourCount] ?>",
                        "image" : "banners/_frontcache/<?= $game->filename ?>",
                        "text" : "<?= $game->name ?>",
                        "icon" : "<?= $game->icon; ?>",
                        "rating" : "<?php
            for ($i = 2; $i <= 10; $i = $i + 2) {
                if ($i <= $rating->average) {
                    print '<img src=\'images/game/star_on.png\' width=15 height=15 border=0>';
                } else if ($rating->average > $i - 2 && $rating->average < $i) {
                    print '<img src=\'images/game/star_half.png\' width=15 height=15 border=0>';
                } else {
                    print '<img src=\'images/game/star_off.png\' width=15 height=15 border=0>';
                }
            }
            ?>",
                        "url" : '<?= $baseurl; ?>/game/<?= $game->id ?>/',
                        "urltext" : 'View Game'
                }
            <?php
            if ($colourCount != 2) {
                $colourCount++;
            } else {
                $colourCount = 0;
            }
        }
    }
    ?>
        ];
        </script>
        <?php
    }
    ?>
</head>

<body>

    <?php
    include("templates/default/layout_frontHeader.php");
    ?>

    <div id="banner"></div>

    <div id="messages">
        <?php include('snippets/errorsAndMessages.php'); ?>
    </div>

    <!-- Start Donation Box -->
    <!--<span  style="width: 244px; position: absolute; top: 17%; right: 2%; z-index: 200; padding: 12px; border: 1px solid #999; background: url(../images/bg_bannerws-thin-glass-strips.png); background-size: cover; border-radius: 12px;">
            <p style="text-align: center; font-size: 24px; padding: 12px; color: #FFF; font-family: sans-serif;">Funds Drive</p>
            <p style="padding-bottom: 12px; text-align: center; color: #FFF; font-family: sans-serif; font-size: 14px;">To keep our free service alive, please consider donating to our funds drive. Thank you!</p>
            <iframe src='http://gogetfunding.com/projects/widget/29570/6' width='240px' height='460px' frameborder='0' scrolling='no'></iframe>
            <p style="text-align: center; padding-top: 12px;"><a class="approve" href="http://gogetfunding.com/project/thegamesdb-net" target="_blank">Donate Here</a></p>
    </span>-->
    <!-- End Donation Box -->


    <div id="frontContentWrapper">

        <div id="frontContent">

            <h1 id="gameCount">
                <?php
                $gamecountResult = mysql_query(" SELECT id FROM games ");
                $gamecount = mysql_num_rows($gamecountResult);
                echo number_format($gamecount) . " games and counting....";
                ?>
            </h1>

            <div id="searchbox" style="padding: 16px 0px; text-align: center;">
                <form id="search" action="<?= $baseurl ?>/search/" autocomplete="off">
                    <input type="text" id="frontGameSearch" name="string"  placeholder="Search Games..." x-webkit-speech style="border-radius: 6px 0px 0px 6px; width: 450px;" />
                    <input type="submit" value="Search" style="border-radius: 0px 6px 6px 0px; height: 36px; padding: 0px 5px 0px 5px;"  />
                    <div id="ajaxSearchResults"></div>
                    <input type="hidden" name="function" value="Search" />
                </form>
            </div>

            <div id="frontnav">
                <div class="frontnav_div"><a href="<? echo $baseurl; ?>/browse/">Games</a></div>
                <div class="frontnav_div"><a href="<? echo $baseurl; ?>/platforms/">Platforms</a></div>
                <div class="frontnav_div"><a href="<? echo $baseurl; ?>/stats/">Stats</a></div>
                <div class="frontnav_div"><a href="<? echo $baseurl; ?>/blog/">Blog</a></div>
                <div class="frontnav_div"><a href="http://forums.thegamesdb.net" target="_blank">Forum</a></div>
                <div class="frontnav_div"><a href="http://wiki.thegamesdb.net">Wiki</a></div>
                <div style="clear: both;"></div>
            </div>

        </div>

    </div>

    <div id="navigationBoxes">
        <!-- Navigation boxes will get injected by jQuery -->	
    </div>

    <div id="pictureSlider">
        <!-- Pictures will be injected by jQuery -->
    </div>

    <div id="footer">
        <div id="footerbarShadow"></div>
        <div id="footerbar">

            <div id="Terms">
                <a href="<?= $baseurl ?>/terms/" style="color: #333;">Terms &amp; Conditions</a>
            </div>

            <div id="theTeam">
                <a href="http://wiki.thegamesdb.net" style="color: #333;">TheGamesDB Wiki</a> | <a href="../showcase" style="color: #333;">Showcase</a>  
            </div>

            <div style="padding-top: 4px;">
                <a href="http://www.facebook.com/thegamesdb" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/facebook_dark.png" alt="Visit us on Facebook" title="Visit us on Facebook" style="border: 0px;" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/facebook_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/facebook_dark.png')" /></a>
                <a href="http://twitter.com/thegamesdb" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/twitter_dark.png" alt="Visit us on Twitter" title="Visit us on Twitter" style="border: 0px;" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/twitter_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/twitter_dark.png')" /></a>
                <a href="https://plus.google.com/116977810662942577082/posts" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/google_dark.png" alt="Visit us on Google Plus" title="Visit us on Google Plus"  style="border: 0px;" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/google_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/google_dark.png')" /></a>
                <a href="<?= $baseurl; ?>/mailshare.php?urlsubject=<?= urlencode("TheGamesDB.net - Home"); ?>&url=<?= urlencode($baseurl); ?>" rel="facebox"><img src="<?= $baseurl ?>/images/common/icons/social/24/share_dark.png" alt="Share via Email" title="Share via Email" style="border: 0px;" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/share_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/share_dark.png')" /></a>
            </div>

        </div>
    </div>

    <?php include('templates/default/credits.php'); ?>

    <div style="display:none;">
        <?php
        for ($i = 0; $i < count($imageUrls); $i++) {
            ?>
            <img src="<?= $imageUrls[$i] ?>" />
            <?php
        }
        ?>
    </div>

    <script type="text/javascript">
        // Ajax Quick Search
        $("#frontGameSearch").bind("focus input paste", function(event) {
        if (this.value)
        {
        $.post("../scripts/ajax_searchgame.php", "searchterm=" + $(this).val(), function(data) {
        if (data.result == 'success')
        {
        var resultsArray = [];
        $.each(data.games, function(index, value) {
        var currentResult = ['<li>',
                '<a href="<?php $baseurl; ?>/game/' + value.id + '">' + value.title + '<br>',
                '<span>' + value.platform + '</span>',
                '</a>',
                '</li>'].join('\n');
        resultsArray.push(currentResult);
        });
        var resultDisplay = ['<ul>',
                resultsArray.join('\n'),
                '</ul>'].join('\n');
        $('#ajaxSearchResults').html(resultDisplay);
        $('#ajaxSearchResults').slideDown();
        }
        else
        {
        $('#ajaxSearchResults').html('');
        $('#ajaxSearchResults').slideUp('fast');
        }
        }, "json");
        }
        else
        {
        $('#ajaxSearchResults').slideUp('fast');
        }

        });
        // Keyboard Navigation For Ajax QuickSearch
        $('#frontGameSearch, #ajaxSearchResults').bind('keydown', function(e) {
        var ajaxParent = $(this).closest('form').children('#ajaxSearchResults').children('ul');
        if ($('#frontGameSearch').is(':focus'))
        {
        if (e.keyCode == 40)
        {
        ajaxParent.children('li').first().children('a').focus();
        return false;
        }
        }
        else
        {
        if (e.keyCode == 40)
        {
        $(':focus').parent().next().children('a').focus();
        e.preventDefault();
        return false;
        }
        else if (e.keyCode == 38)
        {
        $(':focus').parent().prev().children('a').focus();
        e.preventDefault();
        return false;
        }
        else if (e.keyCode == 8)
        {
        $('#frontGameSearch').focus();
        e.preventDefault();
        return false;
        }
        }
        });
        // Hide Ajax QuickSearch When Clicking Outside of Results
        $(document).click(function (e)
        {
        var container = $("#ajaxSearchResults");
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
        container.slideUp('fast');
        }
        });
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-16803563-1']);
        _gaq.push(['_trackPageview']);
        
        (function() {
        var ga = document.createElement('script'); 
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script type="text/javascript">
        // jQuery Snow Script Instance
        // $(document).snowfall({ flakeCount : 200, maxSpeed : 10, round: true, shadow: true, collection: '#footer', minSize: 2, maxSize: 4 });
    </script>

</body>
</html>