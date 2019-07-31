<?php
//接口签署
require_once ('./init.php');
$url = $baseUrl.'/contract/sign/silent';

//参与加密
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => 1,
    'projectSn' => 'ps1520575167',
    'fileSn' => 'sn1520492293',

    'signerOpenId' => '28d96ea089af329603c5ce33074283b464ebb701', //signerOpenid  同 auth 信息传一种即可
//    'idCardType' => '2',
//    'idCardNo' => '110123199001010005',
];

ksort($posts);

$posts['sign'] =  sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密部分
//$posts['mobile'] = '13822221111';
//$posts['name'] = '测试';
$time = time();
$posts['location'] = 'location' . $time;
$posts['reason'] = 'reason' . $time;
$posts['transactionId'] = $uuid;
//$posts['stamp'] = "invisible"; //非必填

$result = exec_post($url, $posts);
print_r($result);








