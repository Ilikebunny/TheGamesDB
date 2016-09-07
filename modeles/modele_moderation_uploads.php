<?php

function get_queueCount($imagekey) {
    $queryResult = mysql_query("SELECT id FROM moderation_uploads WHERE imagekey = '$imagekey'");
    $queueCount = mysql_num_rows($queryResult);
    if (empty($queueCount)) {
        $queueCount = 0;
    }
    return $queueCount;
}

function get_frontQueueCount() {
//    $frontQueueResult = mysql_query("SELECT id FROM moderation_uploads WHERE imagekey = 'front'");
//    $frontQueueCount = mysql_num_rows($frontQueueResult);
//    if (empty($frontQueueCount)) {
//        $frontQueueCount = 0;
//    }
//    return $frontQueueCount;

    $frontQueueCount = get_queueCount('front');
    return $frontQueueCount;
}

function get_backQueueCount() {
    $backQueueResult = mysql_query("SELECT id FROM moderation_uploads WHERE imagekey = 'back'");
    $backQueueCount = mysql_num_rows($backQueueResult);
    if (empty($backQueueCount)) {
        $backQueueCount = 0;
    }
    return $backQueueCount;
}
