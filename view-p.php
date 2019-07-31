<?php
//获取项目全部合同的查看页面
require_once ('./init.php');

$url = $baseUrl.'/project/view';
$time = time();
//须加密字段
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => '1.0',
    'projectSn' => '2019011400001',
];

ksort($posts);

$posts['sign'] = sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);


$result = exec_post($url,$posts);

print_r($result);






