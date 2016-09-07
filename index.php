<?php

## Workaround Fix for lack of "register globals" in PHP 5.4+
require_once("globalsfix.php");

## Connect to the database
include("include.php");

## Other Includes
include("extentions/wideimage/WideImage.php"); ## Image Manipulation Library

$time = time();

## Load Modules
include("modules/all.php");

if ($tab != "login" && isset($redirect)) {
    header("Location: $baseurl$redirect");
    exit;
}

## Default tab
if ($tab == "") {
    $tab = 'mainmenu';
}

if ($tab != "mainmenu") {
    if (!isset($headless)) {
        $tabFile = "tab_$tab.php";
        if (!file_exists($tabFile)) {
            header("HTTP/1.0 404 Not Found");
            $tabFile = "tab_404.php";
        }

        // Load Template Header
        include("templates/default/header.php");

        // Load Tab Content
        include($tabFile);

        // Load Template Header
        include("templates/default/footer.php");
    }
} else {
    include("templates/default/front.php");
}
?>