<?php

function platform_exist($idPlatform, &$errorMessage) {
    $errorMessage = "";
    $exist = false;
    if (empty($idPlatform) || empty($idPlatform)) {
        $errorMessage = "<Error>A platform is required</Error>\n";
    } else {
        if ($platformQuery = mysql_query(" SELECT id FROM platforms WHERE id = '$idPlatform' ")) {
            if ($platformResult = mysql_fetch_object($platformQuery)) {
                $exist = true;
            } else {
                $errorMessage = "<Error>Platform Id not found</Error>";
            }
        }
    }
    return $exist;
}

function platform_getAverageRating($idPlatform) {
    $ratingquery = "SELECT AVG(rating) AS average, count(*) AS count FROM ratings WHERE itemtype='platform' AND itemid=$idPlatform";
    $ratingresult = mysql_query($ratingquery) or die('Query failed: ' . mysql_error());
    $rating = mysql_fetch_object($ratingresult);
    $averageRating = $rating->average;
    return $averageRating;
}

function platform_getGameCount($idPlatform) {
    $gameCountQuery = mysql_query(" SELECT count(*) AS gamecount FROM games WHERE games.platform = $idPlatform");
    $gameCountResult = mysql_fetch_object($gameCountQuery);
    $gameCount = $gameCountResult->gamecount;
    return $gameCount;
}

function platform_getNumberImages($idPlatform, &$boxartResult, &$fanartResult, &$bannerResult) {
    $boxartQuery = mysql_query("SELECT keyvalue FROM banners WHERE banners.keyvalue = '$idPlatform' AND banners.keytype = 'platform-boxart' LIMIT 1");
    $boxartResult = mysql_num_rows($boxartQuery);

    $fanartQuery = mysql_query("SELECT keyvalue FROM banners WHERE banners.keyvalue = '$idPlatform' AND keytype = 'platform-fanart' LIMIT 1");
    $fanartResult = mysql_num_rows($fanartQuery);

    $bannerQuery = mysql_query("SELECT keyvalue FROM banners WHERE banners.keyvalue = '$idPlatform' AND keytype = 'platform-banner' LIMIT 1");
    $bannerResult = mysql_num_rows($bannerQuery);
}

function platform_getBoxart($idPlatform) {
    if ($boxartResult = mysql_query(" SELECT b.filename FROM banners as b WHERE b.keyvalue = '$idPlatform' AND b.keytype = 'platform-boxart' LIMIT 1 ")) {
        $boxart = mysql_fetch_object($boxartResult);
    }
    return $boxart;
}

?>