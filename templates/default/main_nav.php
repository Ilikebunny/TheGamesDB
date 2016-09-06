
<div id="nav" style="position: absolute; top: 78px; left: 0px; width: 100%;">
    <div style="width: 1000px; margin: 0px auto;">
        <form id="search" action="<?= $baseurl ?>/search/">
            <input class="left autosearch" type="text" name="string" style="color: #333; margin-left: 40px; margin-top: 5px; width: 190px;" />
            <input type="hidden" name="function" value="Search" />
            <input class="left" type="submit" value="Search" style="margin-top: 4px; margin-left: 4px; height: 24px;" />
        </form>
        <ul>
            <li id="nav_donation" class="tab"><a href="<?= $baseurl ?>/donation/"></a></li>
            <li id="nav_forum" class="tab"><a target="_blank" href="http://forums.thegamesdb.net"></a></li>
            <li id="nav_stats" class="tab"><a href="<?= $baseurl ?>/stats/"></a></li>
            <?php if ($loggedin): ?>
                <li id="nav_submit" class="tab"><a href="<?= $baseurl ?>/addgame/"></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div id="navMain">

    <ul class="navLinks">

        <!-- GAMES NAV ITEM -->
        <?
        $class = "";
        if ($tab == "game" || $tab == "game-edit" || $tab == "listseries" || $tab == "listplatform" || $tab == "recentgames" ||
                $tab == "recentaddedgames" || $tab == "topratedgames" || $tab == "addgame" || $tab == "playgames") {
            $subnav = "games";
            $class = "active";
        }

        echo "<li class='$class'><a href='$baseurl/browse/'>Games</a></li>";
        ?>

        <!-- PLATFORMS NAV ITEM -->
        <?
        $class = "";
        if ($tab == "platform" || $tab == "platform-edit" || $tab == "platforms" || $tab == "topratedplatforms") {
            $subnav = "platforms";
            $class = "active";
        }

        echo "<li class='$class'><a href='$baseurl/platforms/'>Platforms</a></li>";
        ?>

        <!-- STATS NAV ITEM -->
        <?
        $class = "";
        if ($tab == "stats" || $tab == "adminstats" || $tab == "userlist" || $tab == "bannerartists" || $tab == "recentbanners") {
            $subnav = "stats";
            $class = "active";
        }

        echo "<li class='$class'><a href='$baseurl/stats/'>Stats</a></li>";

        unset($class);
        ?>

        <!-- FORUMS NAV ITEM -->
        <li><a href="http://forums.thegamesdb.net">Forums</a></li>

    </ul>

    <!-- ADD NEW GAME NAV ITEM -->
    <a href="<?= $baseurl ?>/addgame/" class="addgameButton">Add New Game</a>

    <!-- SEARCH NAV ITEM -->
    <div style="text-align: left; position: relative; float: right; height: 18px; width: 200px; padding: 2px 3px; margin: 3px 50px; border: 1px solid #999; border-radius: 6px; background-color: #eee; ">
        <form action="<?= $baseurl ?>/search/" id="searchForm" style="width: 300px;" autocomplete="off">
            <img src="<?= $baseurl ?>/images/common/icons/search_18.png" style="margin: 0px 5px; padding: 0px; vertical-align: middle; position: absolute;" onclick="if ($('#navSearch').val() != '') {
                        $('#searchForm').submit();
                    } else {
                        alert('Please enter something to search for before pressing search!');
                    }" /><input type="text" name="string" id="navSearch" class="ajaxSearch" style="height: 18px; width: 170px; border: 0px; padding: 0px; margin: 0px auto; background-color: #eee; position: absolute; left: 30px;" />
            <input type="hidden" name="function" value="Search" />
            <div class="ajaxSearchResults" style="top: 22px; right: -45px;"></div>
        </form>
    </div>

</div>

<?php
if ($subnav == "games") {
    ?>
    <div id="navSubGames" class="navSub">
        <ul class="navSubLinks">
            <li><a href="<?= $baseurl ?>/browse/">Browse Games</a></li>
            <li><a href="<?= $baseurl ?>/topratedgames/">Top Rated Games</a></li>
            <li><a href="<?= $baseurl ?>/recentaddedgames/">Recently Added Games</a></li>
            <li><a href="<?= $baseurl ?>/recentgames/">Recently Updated Games</a></li>
            <li><a href="<?= $baseurl ?>/playgames/">Play Free Games</a></li>
        </ul>
    </div>
    <?php
} else if ($subnav == "platforms") {
    ?>
    <div id="navSubPlatforms" class="navSub">
        <ul class="navSubLinks">
            <li><a href="<?= $baseurl ?>/platforms/">All Platforms</a></li>
            <li><a href="<?= $baseurl ?>/topratedplatforms/">Top 10 Rated Platforms</a></li>
        </ul>
    </div>
    <?php
} else {
    ?>
    <div id="navSub" class="navSub">
        &nbsp;
    </div>
    <?php
}
?>