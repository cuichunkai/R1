<?php
//初始配置

//公用配置
$openId='05cfd4882ec8505c1e1bc5aca48ecd2220877f6f';//'eed28d1f1382852e2a7003cc8d1a9300c5c7bb44';
$appSecret='$2y$13$CotIA/O9dGCFw.5w7fznCuEz0fJzWZOdI0Dt2GoEmmcFpeeWfxhR2';//'$2y$13$yUhvpeYABhUQa33BekSC6.IsdnC8rGS7f3BMp4hSA6pExfCiHe4v.';

//测试环境
$baseUrl = 'https://private-api.hesigning.com';

//随机生成nonce
$chars = md5(uniqid(mt_rand(), true));
$uuid = substr($chars, 0, 8) . '-';
$uuid .= substr($chars, 8, 4) . '-';
$uuid .= substr($chars, 12, 4) . '-';
$uuid .= substr($chars, 16, 4) . '-';
$uuid .= substr($chars, 20, 12);

//公用方法
function exec_post($url, $posts)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posts));

    $result = curl_exec($ch);
    if ( !$result) {
        var_dump(curl_error($ch));
    }
    curl_close($ch);
    return json_decode($result, true);
}