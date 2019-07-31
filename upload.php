<?php
//上传合同
require_once ('./init.php');

$url = $baseUrl.'/contract/upload';

//参与加密
$posts = [
    'openId'    => $openId,
    'version'   => '1.0',
    'nonce'     => $uuid,
    'projectSn' => '2018070500098',
    'files' => [
        ['sn' => 'sn0988735'], //必填
    ]

];
ksort($posts);

$posts['sign'] = sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密部分

$posts['projectName'] = '123456789012' . date('mdHis');
$posts['notifyUrl'] = 'https://www.notify_update.com';
//第1个合同
$posts['files'][0]['name'] = '12345678901234567890' . date('mdHis');
$posts['files'][0]['file'] = file_get_contents('test.pdf');
$posts['files'][0]['permission'] = '*';


$posts['files'][0]['sign'][0]['idCardType'] = '2';
$posts['files'][0]['sign'][0]['idCardNo'] = '330327199302247230';
$posts['files'][0]['sign'][0]['name'] = '方明东';
$posts['files'][0]['sign'][0]['mobile'] = '13822221111';
$posts['files'][0]['sign'][0]['auto'] = 1;
$posts['files'][0]['sign'][0]['position'] = '1,0.1,0.2';
//$posts['files'][0]['sign'][0]['positionType'] = '1';//非必填默认1
//$posts['files'][0]['sign'][0]['stamp'] = 'invisible';////非必填

$result = exec_post($url, $posts);
print_r($result);

