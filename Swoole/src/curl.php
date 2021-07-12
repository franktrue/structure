<?php
// Swoole\Runtime::enableCoroutine(SWOOLE_HOOK_ALL|SWOOLE_HOOK_CURL);
$n = 30551;
$headers = [
    "Connection" => "Keep-Alive",
    "Accept" => "*/*",
    "Pragma" => "no-cache",
    "Accept-Language" => "zh-Hans-CN,zh-Hans;q=0.8,en-US;q=0.5,en;q=0.3",
    "User-Agent" =>"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)",
    "Content-Type" => "application/json",
    "Cookie" => "Hm_lvt_0cb4627679a11906d6bf0ced685dc014=1626055761; acw_tc=707c9fd116260579339027836e29c4c4aad07dbfcaf229f47b0fa8a6653cde; Hm_lpvt_0cb4627679a11906d6bf0ced685dc014=1626058183; loginSession=a9c2ece95242506c009051d99097e39d&&a720068dc98665b9deb8d0dfb2dbfb8a",
    "Host" => "platformwxgateway.polyt.cn",
    "Origin" => "https://m.polyt.cn",
    "Referer" => "https://m.polyt.cn/"
];
$postBody = [
    "theaterId" => "40",
    "projectId" => "594121812962119680",
    "productId" => (string)$n,
    "seriesId" => "",
    "channelId" => "",
    "requestModel" => [
        "applicationSource" => "plat_wx",
        "current" => 1,
        "size" => 10,
        "atgc" => "2015d0653cc12d1694e7424444e3735b",
        "utgc" => "utoken",
        "time" => time(),
        "applicationCode" => "plat_wx"
    ]
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://platformwxgateway.polyt.cn/api/1.0/ticket/getProjectDetail");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//设置请求头
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postBody));//设置请求体
$output = curl_exec($ch);
if ($output === false) {
    echo "CURL Error:" . curl_error($ch);
}
curl_close($ch);
var_dump($output);
echo strlen($output) . " bytes\n";
