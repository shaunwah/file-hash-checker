<?php
require 'vendor/autoload.php';

$fileBlacklist = []; // todo

inputUrl:
echo "Enter the file's URL:\r\n";
$fileUrl = readline();

if (!empty($fileUrl)) {
    $fileName = basename($fileUrl);

    try {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($fileUrl);
        $fileHash = $response->getHeader('ETag')[0];

        echo $fileHash . "\r\n";
    } catch (Exception $e) {
        echo "An error occured.\r\n";
    }
}
goto inputUrl;
return;
