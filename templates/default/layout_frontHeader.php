<div id="frontHeader">
    <div id="frontBanner">
        <p id="frontBanner_p">
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
        <a href="../" title="An open database of video games">
            <img id="bannerThinGlass" src="../images/bannerws-thin-glass-v2.png"/>
        </a>
    </div>
</div>