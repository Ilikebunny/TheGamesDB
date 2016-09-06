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

?>