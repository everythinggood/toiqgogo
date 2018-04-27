<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 3:56 PM
 */

require __DIR__ . '/../vendor/autoload.php';

//$content = <<<XML
//<xml><URL><![CDATA[http://toiqgogo.com/wxScanPush]]></URL><ToUserName><![CDATA[gh_89a2cde84fbe]]></ToUserName><FromUserName><![CDATA[oX8Ie1c4jNeN1qfXvQ9cat4Gmk8U]]></FromUserName><CreateTime>1524557199</CreateTime><MsgType><![CDATA[event]]></MsgType><Event><![CDATA[SCAN]]></Event><Latitude></Latitude><Longitude></Longitude><Precision></Precision><MsgId>22222</MsgId></xml>
//XML;
//
//
//libxml_disable_entity_loader(true);
//$json = json_decode(json_encode(simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

$FromUserName = 'o2QbF1ehRjXUteuLmmef1X2kXap0';

$client = new \GuzzleHttp\Client();

$access_token = file_get_contents(__DIR__ . '/../cache/access_token');

$response = $client->request('POST', 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $access_token ,[
        'body' => json_encode([
            'touser' => $FromUserName,
            'msgtype' => 'text',
            'text' => [
                'content' => "请点击【<a href=\"http://m.zhiwei99.com/addon/YiKaTong/GuanzhuGzh/up?state=412\">免费领取纸巾</a>]"
            ]
        ],JSON_UNESCAPED_UNICODE)
    ]);
//$response = $client->request('POST', 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $access_token ,[
//        'body' => json_encode([
//            'touser' => $FromUserName,
//            'msgtype' => 'news',
//            'news' => [
//                'articles' => [
//                    [
//                        'title'=>'免费领取纸巾',
//                        "url"=>'http://m.zhiwei99.com/addon/YiKaTong/GuanzhuGzh/up?state=412'
//                    ]
//                ]
//
//            ]
//        ],JSON_UNESCAPED_UNICODE)
//    ]);

var_export($response->getBody()->getContents());


/**
 * <xml> <ToUserName>< ![CDATA[toUser] ]></ToUserName> <FromUserName>< ![CDATA[FromUser] ]></FromUserName>
 * <CreateTime>123456789</CreateTime> <MsgType>< ![CDATA[event] ]></MsgType> <Event>< ![CDATA[SCAN] ]></Event>
 * <EventKey>< ![CDATA[SCENE_VALUE] ]></EventKey> <Ticket>< ![CDATA[TICKET] ]></Ticket> </xml>
 *
 *
 */

/**
 * https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN
 * {
 * "touser":"OPENID",
 * "msgtype":"text",
 * "text":
 * {
 * "content":"Hello World"
 * }
 * }
 *
 *
 */
