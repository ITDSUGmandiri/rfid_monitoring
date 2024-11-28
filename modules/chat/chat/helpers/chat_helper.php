<?php

use Symfony\Component\VarDumper\VarDumper;

define('DEFAULT_URL', get_option('chat_fb_url', 'https://fire-notif.firebaseio.com/'));
define('KEY', get_option('chat_fb_key', md5(uniqid())));
define('BASE_PATH', '/' . KEY . '/');
define('DEFAULT_PATH', BASE_PATH . 'notify-user/');
define('CHAT_READ_PATH', BASE_PATH . 'notify-read-chats/');

function getJsonPath($path, $options = array())
{
    $url = DEFAULT_URL;
    $options = [];
    $path = ltrim($path, '/');
    $query = http_build_query($options);
    return "$url$path.json?$query";
}
function getCurlHandler($path, $mode, $options = array())
{

    $url = getJsonPath($path, $options);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $mode);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    return $ch;
}
function writeData($path, $data, $method = 'PUT', $options = array())
{
    $jsonData = json_encode($data);
    $header = array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    );
    try {
        $ch = getCurlHandler($path, $method, $options);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($ch);
        dd($return);
    } catch (Exception $e) {
        $return = null;
    }

    return $return;
}

function deleteData($path)
{
    try {
        $ch = getCurlHandler($path, 'DELETE', []);
        $return = curl_exec($ch);
    } catch (Exception $e) {
        $return = null;
    }
    return $return;
}

function gen_chat_uuid()
{
    return strtoupper(sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    ));
}
function gen_user_id($id = null)
{
    return md5(md5($id . 'cckey'));
}
