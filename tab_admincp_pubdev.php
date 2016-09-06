<h2>Manage Publishers and Developers</h2>

<p>&nbsp;</p>

<p style="text-align: center;"><a style="color: orange;" href="<?= $baseurl ?>/addpub/">Add new Publisher/Developer</a></p>

<table align="center" border="1" cellspacing="0" cellpadding="7" bgcolor="#888888">
    <tr>
        <th style="background-color: #333; color: #FFF;">Keywords</th>
        <th style="background-color: #333; color: #FFF;">Logo</th>
        <th style="background-color: #333; color: #FFF;">Action</th>
    </tr>

    <?php
    $pubdevQuery = mysql_query(" SELECT * FROM pubdev ORDER BY keywords ASC");
    while ($pubdevResult = mysql_fetch_object($pubdevQuery)) {
        ?>
        <tr>
            <td><?= $pubdevResult->keywords ?></td>
            <?php
            if (!file_exists("banners/_admincpcache/publisher-logos/$pubdevResult->logo")) {
                WideImage::load("banners/publisher-logos/$pubdevResult->logo")->resize(400, 60)->saveToFile("banners/_admincpcache/publisher-logos/$pubdevResult->logo");
            }
            ?>
            <?php
            if ($pubdevResult->logo) {
                ?>
                <td><img src="<?= $baseurl ?>/banners/_admincpcache/publisher-logos/<?= $pubdevResult->logo ?>" style="vertical-align: middle;" /></td>
                <?php
            } else {
                echo "<td>Logo Missing</td>";
            }
            ?>
            <td><a style="color: orange;" href="<?= $baseurl ?>/updatepub/?publisherid=<?= $pubdevResult->id ?>">Update Keywords &amp; Logo</a></td>
        </tr>
        <?php
    }
    ?>
</table>