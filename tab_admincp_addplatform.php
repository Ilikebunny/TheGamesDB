<h2>Add a Platform...</h2>

<p>&nbsp;</p>

<form method="post" action="<?= $baseurl; ?>/admincp/" enctype="multipart/form-data">
    <p style="text-align: center;"><img src="<?= $baseurl; ?>/images/common/consoles/png24/console_default.png" style="vertical-align: middle;" />&nbsp;To create a new platform, enter it's name below.</p>
    <p style="text-align: center; font-weight: bold;">Platform Name:&nbsp;<input type="text" name="PlatformTitle" size="60" /><br />
        <input type="hidden" name="function" value="Add Platform" />
        <input type="submit" name="submit" value="Add New Platform" style="padding: 6px;" /></p>
</form>