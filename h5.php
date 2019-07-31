<?php
//页面签署
require_once ('./init.php');
$url = $baseUrl.'/contract/sign/h5';


//参与加密
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => 1,
    'projectSn' => '2018070500098',
    'fileSn' => 'sn0988731',

//    'signerOpenId' => '28d96ea089af329603c5ce33074283b464ebb701', //signerOpenid  同 auth 信息传一种即可
    'idCardType' => '2',
    'idCardNo' => '330327199302247230',
];

ksort($posts);

$posts['sign'] =  sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密部分
$posts['mobile'] = '13822221111';
$posts['name'] = '方明东';
$time = time();
$posts['location'] = 'sn' . $time;
$posts['reason'] = 'sn' . $time;
$posts['transactionId'] = $uuid;//交易号可由平台生成，必须唯一
$posts['smsMobile'] = '13822221111';
$posts['redirectUrl'] = "http://www.baidu.com";
$posts['method'] = "handwrite";
//$posts['stamp'] = "invisible"; //非必填


$result = exec_post($url, $posts);
print_r($result);





