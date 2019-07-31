<?php
//页面查看合同
require_once ('./init.php');

$url = $baseUrl.'/contract/view';
$time = time();
//须加密字段
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => '1.0',
    'projectSn' => 'ps1520575167',
    'fileSn' => 'sn1520492293',
];

ksort($posts);

$posts['sign'] = sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密字段 source非必填
//$posts['source'] = 'DEFAULT';

$result = exec_post($url,$posts);

print_r($result);






