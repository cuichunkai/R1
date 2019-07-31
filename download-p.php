<?php
//下载项目全部合同
require_once ('./init.php');
$url = $baseUrl.'/project/download';


//参与加密
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => 1,
    'projectSn' => 'ps1520575167',
];

ksort($posts);

$posts['sign'] =  sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);


$result = exec_post($url, $posts);
print_r($result);







