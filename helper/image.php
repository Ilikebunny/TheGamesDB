<?php

include('simpleimage.php');

function imageResize($filename, $cleanFilename, $target) {
    if (!file_exists($cleanFilename)) {
        $dims = getimagesize($filename);
        $width = $dims[0];
        $height = $dims[1];
        //takes the larger size of the width and height and applies the formula accordingly...this is so this script will work dynamically with any size image
        if ($width > $height) {
            $percentage = ($target / $width);
        } else {
            $percentage = ($target / $height);
        }

        //gets the new value and applies the percentage, then rounds the value
        $width = round($width * $percentage);
        $height = round($height * $percentage);

        $image = new SimpleImage();
        $image->load($filename);
        $image->resize($width, $height);
        $image->save($cleanFilename);
        $image = null;
    }
    //returns the new sizes in html image tag format...this is so you can plug this function inside an image tag and just get the
    return "src=\"$baseurl/$cleanFilename\"";
}

function imageResize2($filename, $cleanFilename, $target, $axis) {
    if (!file_exists($cleanFilename)) {
        $dims = getimagesize($filename);
        $width = $dims[0];
        $height = $dims[1];
        //takes the larger size of the width and height and applies the formula accordingly...this is so this script will work dynamically with any size image

        if ($axis == "width") {
            $percentage = ($target / $width);
        } else if ($axis == "height") {
            $percentage = ($target / $height);
        } else if ($width > $height) {
            $percentage = ($target / $width);
        } else {
            $percentage = ($target / $height);
        }

        //gets the new value and applies the percentage, then rounds the value
        $width = round($width * $percentage);
        $height = round($height * $percentage);

        $image = new SimpleImage();
        $image->load($filename);
        $image->resize($width, $height);
        $image->save($cleanFilename);
        $image = null;
    }
    //returns the new sizes in html image tag format...this is so you can plug this function inside an image tag and just get the
    return "src=\"$baseurl/$cleanFilename\"";
}

function imageDualResize($filename, $cleanFilename, $wtarget, $htarget) {
    if (!file_exists($cleanFilename)) {
        $dims = getimagesize($filename);
        $width = $dims[0];
        $height = $dims[1];

        while ($width > $wtarget || $height > $htarget) {
            if ($width > $wtarget) {
                $percentage = ($wtarget / $width);
            }

            if ($height > $htarget) {
                $percentage = ($htarget / $height);
            }

            /* if($width > $height)
              {
              $percentage = ($target / $width);
              }
              else
              {
              $percentage = ($target / $height);
              } */

            //gets the new value and applies the percentage, then rounds the value
            $width = round($width * $percentage);
            $height = round($height * $percentage);
        }

        $image = new SimpleImage();
        $image->load($filename);
        $image->resize($width, $height);
        $image->save($cleanFilename);
        $image = null;
    }
    //returns the new sizes in html image tag format...this is so you can plug this function inside an image tag and just get the
    return "src=\"$baseurl/$cleanFilename\"";
}

function imageUsername($artID) {
    ## Get the user who uploaded
    $query = "SELECT u.id, u.username FROM users AS u, banners AS b WHERE b.id = '$artID' AND u.id = b.userid";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    $imageUser = mysql_fetch_object($result);

    $str = "Uploader:&nbsp;<a href='$baseurl/artistbanners/?id=$imageUser->id' style='color: orange;'>$imageUser->username</a>";

    return $str;
}

?>