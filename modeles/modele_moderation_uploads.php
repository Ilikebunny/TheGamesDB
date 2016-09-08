<?php

function get_queueCount($imagekey) {
    $queryResult = mysql_query("SELECT id FROM moderation_uploads WHERE imagekey = '$imagekey'");
    $queueCount = mysql_num_rows($queryResult);
    if (empty($queueCount)) {
        $queueCount = 0;
    }
    return $queueCount;
}

function get_QueueCount_front() {
    $frontQueueCount = get_queueCount('front');
    return $frontQueueCount;
}

function get_QueueCount_back() {
    $backQueueCount = get_queueCount('back');
    return $backQueueCount;
}

function get_QueueCount_clearlogo() {
    $queueCount = get_queueCount('clearlogo');
    return $queueCount;
}

function get_Queue_QueryResult($imagekey) {
    $queryResult = mysql_query("SELECT m.*, u.username, g.GameTitle, p. NAME AS PlatformName, p.id AS PlatformID FROM moderation_uploads AS m, users AS u, games AS g, platforms AS p WHERE imagekey = '$imagekey' AND m.userID = u.id AND m.gameID = g.id AND g.Platform = p.id ORDER BY dateadded");
    return $queryResult;
}
