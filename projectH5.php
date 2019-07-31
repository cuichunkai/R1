<?php
//页面批量签署
require_once ('./init.php');
$url = $baseUrl.'/project/sign/h5';


//参与加密
$posts = [
    'openId' => $openId,
    'nonce' => $uuid,
    'version' => 1,
    'projectSn' => '2018070500098',

    'signerOpenId' => '479a9d1939aa069ab20a46f8b112fa40a773ef9f', //signerOpenid  同 auth 信息传一种即可
//    'idCardType' => '2',
//    'idCardNo' => '110123199001010005',
];

ksort($posts);

$posts['sign'] =  sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密部分
//$posts['mobile'] = '13822221111';
//$posts['name'] = '测试';
$time = time();
$posts['location'] = 'sn' . $time;
$posts['reason'] = 'sn' . $time;
$posts['transactionId'] = $uuid;//交易号可由平台生成，必须唯一
$posts['smsMobile'] = '18612186324';
$posts['redirectUrl'] = "http://www.baidu.com";
$posts['method'] = "handwrite";
//$posts['stamp'] = "invisible"; //非必填


$result = exec_post($url, $posts);
print_r($result);





