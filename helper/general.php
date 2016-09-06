<?php

function printRatingBar($myRating) {
    for ($i = 2; $i <= 10; $i = $i + 2) {
        if ($i <= $myRating) {
            print "<img src=\"$baseurl/images/game/star_on.png\" width=15 height=15 border=0 />";
        } else if ($myRating > $i - 2 && $myRating < $i) {
            print "<img src=\"$baseurl/images/game/star_half.png\" width=15 height=15 border=0 />";
        } else {
            print "<img src=\"$baseurl/images/game/star_off.png\" width=15 height=15 border=0 />";
        }
    }
}
