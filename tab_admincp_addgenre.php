<h2>Add a Genre...</h2>

<p>&nbsp;</p>

<form method="post" action="<?= $baseurl; ?>/admincp/" enctype="multipart/form-data">
    <p style="text-align: center;">&nbsp;To create a new genre, enter it's name below.</p>
    <p style="text-align: center; font-weight: bold;">Genre Name:&nbsp;<input type="text" name="genreName" size="60" /><br />
        <input type="hidden" name="function" value="Add Genre" />
        <input type="submit" name="submit" value="Add New Genre" style="padding: 6px;" /></p>
</form>

<p>&nbsp;</p>
<h2>Existing games genres<h2>
        <p>&nbsp;</p>

        <table align="center" border="1" cellspacing="0" cellpadding="7" bgcolor="#888888">
            <tr>
                <th style="background-color: #333; color: #FFF;">Id</th>
                <th style="background-color: #333; color: #FFF;">Genre</th>
            </tr>

            <?php
            $pubdevQuery = mysql_query(" SELECT * FROM genres ORDER BY genre ASC");
            while ($pubdevResult = mysql_fetch_object($pubdevQuery)) {
                ?>
                <tr>
                    <td><?= $pubdevResult->id ?></td>
                    <td><?= $pubdevResult->genre ?></td>
                </tr>
                <?php
            }
            ?>
        </table>