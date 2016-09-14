<!-- Page Footer -->
<div id="pageFooter">
    <table style="width: 100%;" cellpadding="2">
        <tr>
            <td colspan="5"><h3>Friends of TheGamesDB.net</h3></td>
        </tr>
        <tr>
            <td style="width: 30%;"><a style="color: orange;" href="http://hostsphere.co.uk/" alt="HostSphere | Unlimited Web Hosting | VPS | Hybrid Servers | Dedicated Servers" title="HostSphere | Unlimited Web Hosting | VPS | Hybrid Servers | Dedicated Servers">HostSphere.co.uk</a></td>
            <td style="width: 5%;">|</td>
            <td style="width: 30%;"><a style="color: orange;" href="http://xbmc.org/">XBMC.org</a></td>
            <td style="width: 5%;">|</td>
            <td style="width: 30%;"><a style="color: orange;" href="http://fanart.tv/">Fanart.tv</a></td>
        </tr>
    </table>
</div>

</div>				

</div>

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
            <a href="http://www.facebook.com/thegamesdb" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/facebook_dark.png" alt="Visit us on Facebook" title="Visit us on Facebook" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/facebook_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/facebook_dark.png')" /></a>
            <a href="http://twitter.com/thegamesdb" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/twitter_dark.png" alt="Visit us on Twitter" title="Visit us on Twitter" onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/twitter_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/twitter_dark.png')" /></a>
            <a href="https://plus.google.com/116977810662942577082/posts" target="_blank"><img src="<?= $baseurl ?>/images/common/icons/social/24/google_dark.png" alt="Visit us on Google Plus" title="Visit us on Google Plus"  onmouseover="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/google_active.png')" onmouseout="$(this).attr('src', '<?= $baseurl ?>/images/common/icons/social/24/google_dark.png')" /></a>
        </div>

    </div>
</div>

<?php include('templates/default/credits.php'); ?>

<script src="../../js/gdb_quicksearch_main.js" type="text/javascript"></script>
<script src="../../js/gdb_ga.js" type="text/javascript"></script>

<!-- Start Force instant run of cufon to circumvent IE delay -->
<script type="text/javascript"> Cufon.now();</script>
<!-- End Force instant run of cufon to circumvent IE delay -->

<div id="fb-root"></div>

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>

</html>