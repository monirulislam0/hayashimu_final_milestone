<?php
$targetFolder = '/home/merlint1/hayashimu_app/storage/app/public/';
echo $targetFolder . '<br>';

$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
echo $linkFolder . '<br>';

// Check if the symlink already exists
if (!is_link($linkFolder)) {
    // Create the symbolic link
    symlink($targetFolder, $linkFolder);
    echo 'Symlink process successfully completed';
} else {
    echo 'Symlink already exists';
}