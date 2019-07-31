<?php
//根据模板创建合同
require_once ('./init.php');

$url = $baseUrl.'/contract/from/tpl';

//参与加密
$posts = [
    'openId'    => $openId,
    'version'   => '1.0',
    'nonce'     => $uuid,
    'projectSn' => 'ps1520575167',
    'files' => [
        ['sn' => 'sn1520492293'], //如多文件 多sn都需要参与加密
//        ['sn' => 'sn1520492210'],
    ]

];
ksort($posts);

$posts['sign'] = sha1(http_build_query($posts)."&nonce=" . $posts['nonce'] . "&appSecret=" . $appSecret);

//非加密部分

$posts['projectName'] = '123456789012' . date('mdHis');
$posts['notifyUrl'] = 'https://www.notify_update.com';
//第1个合同
$posts['files'][0]['name'] = '12345678901234567890' . date('mdHis');
$posts['files'][0]['templateId'] = 'HQ89548328';//须在和签平台首先创建模板，得到此模板ID
$posts['files'][0]['permission'] = '*';
$posts['files'][0]['params'] = json_encode(array('name'=>'张四'));//如无可写空json  '{}'

$posts['files'][0]['sign'][0]['idCardType'] = '2';
$posts['files'][0]['sign'][0]['idCardNo'] = '110123199001010005';
$posts['files'][0]['sign'][0]['name'] = '测试';
$posts['files'][0]['sign'][0]['mobile'] = '13822221111';
$posts['files'][0]['sign'][0]['identity'] = '1';
$posts['files'][0]['sign'][0]['auto'] = 1;
$posts['files'][0]['sign'][0]['reason'] = 'sn'.time();
//$posts['files'][0]['sign'][0]['stamp'] = 'invisible';//非必填
$posts['files'][0]['sign'][0]['location'] = 'sn'.time();

$posts['files'][0]['sign'][1]['openId'] = 'b266fd3db81b1f1408f5b6e8699980ac1d4e7cd4'; //openId 和 auth 只需要传一个
$posts['files'][0]['sign'][1]['auto'] = 0;
$posts['files'][0]['sign'][1]['identity'] = '2';
//$posts['files'][0]['sign'][1]['reason'] = 'sn'.time();//非必填
//$posts['files'][0]['sign'][1]['stamp'] = 'invisible';//非必填
//$posts['files'][0]['sign'][1]['location'] = 'sn'.time();//非必填


//第2个合同 如多文件 将以上file 0字段重复
//$posts['files'][1]['name'] …………

$result = exec_post($url, $posts);
print_r($result);

