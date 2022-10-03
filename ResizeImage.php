<?php require_once 'ressource/vendor/autoload.php'; ?>

<?php

use Imagine\Image\Box;
use Imagine\Image\Point;
?>

<?php
function resize($nom, $dest)
{
    $imagine = new Imagine\Gd\Imagine();
    $size = new Imagine\Image\Box(340, 340);

    $image = $imagine->open($nom)->thumbnail($size, 'outbound')->save($dest);
}
?>
