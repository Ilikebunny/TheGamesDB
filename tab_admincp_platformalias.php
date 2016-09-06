<h2>Generate Platform Alias'...</h2>

<form action="<?= $baseurl; ?>/admincp/?cptab=platformalias" method="post" style="text-align: center; padding: 16px; border: 1px solid #666; background-color: #333; color: #fff; margin: 16px;">
    <p style="font-size: 18px;">Press the button below to auto-generate alias's for platforms missing an alias.</p>
    <input type="submit" name="function" value="Generate Platform Alias's" style="padding: 16px;" />
</form>

<table align="center" border="1" cellspacing="0" cellpadding="7" bgcolor="#888888">
    <tr>
        <th style="background-color: #333; color: #FFF;" width="14%">ID</th>
        <th style="background-color: #333; color: #FFF;" width="43%">Name</th>
        <th style="background-color: #333; color: #FFF;" width="43%">Alias</th>
    </tr>

    <?php
    $platformsResult = mysql_query(" SELECT p.id, p.name, p.alias FROM platforms AS p ORDER BY p.id ");
    while ($platforms = mysql_fetch_object($platformsResult)) {
        if ($class == 'odd') {
            $class = 'even';
        } else {
            $class = 'odd';
        }
        ?>
        <tr class="<?= $class; ?>">
            <td align="center"><?= $platforms->id; ?></td>
            <td><?= $platforms->name; ?></td>
            <td><?php
                if ($platforms->alias == "") {
                    echo "N/A";
                } else {
                    echo $platforms->alias;
                }
                ?></td>
        </tr>
        <?php
    }
    ?>
</table>