<h2>Send PM to User...</h2>

<form action="<?= $baseurl; ?>/admincp/?cptab=sendpm" method="post">
    <span style="float: right;"><input type="submit" name="function" value="Send PM" /></span>
    <p><b>Send To:</b>&nbsp;<input type="text" name="pmto" id="pm-to" size="36" /> <a href="#pm-userlist" rel="facebox">User List</a></p>
    <p><b>Subject:</b>&nbsp;&nbsp;<input type="text" name="pmsubject" size="36" /></p>
    <p><b>Message:</b><br />
        <textarea name="pmmessage" style="width: 100%; height: 300px;"></textarea></p>
</form>

<!-- User List-->
<div id="pm-userlist" style="display: none;">
    <div style="height: 400px; overflow: auto;">
        <p>
            <?php
            $userlistQuery = mysql_query("SELECT id, username FROM users ORDER BY username ASC");
            while ($userlist = mysql_fetch_object($userlistQuery)) {
                ?>
                <a href="javascript: void();" onclick="$('#pm-to').val('<?= $userlist->username ?>');
                        jQuery(document).trigger('close.facebox');"><?= $userlist->username; ?></a><br />
                   <?php
               }
               ?>
        </p>
    </div>
</div>