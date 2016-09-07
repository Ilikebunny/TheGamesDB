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
    $frontQueueCount = get_queueCount('front');
    return $frontQueueCount;
}

function get_backQueueCount() {
    $backQueueCount = get_queueCount('back');
    return $backQueueCount;
}
