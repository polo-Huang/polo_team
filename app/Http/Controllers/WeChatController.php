<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function index(Request $request)
    {
    	// dd(1);
    	// 加密签名
    	$signature = $request['signature'];
    	// 时间戳
    	$timestamp = $request['timestamp'];
    	// 随机数
    	$nonce = $request['nonce'];
    	// 随机字符串
    	$echostr = $request['echostr'];
    	// TOKEN
    	define('TOKEN', 'atelier');
    	// 字典序排序
    	$tmpArr = array(TOKEN, $timestamp, $nonce);
    	sort($tmpArr, SORT_STRING);
    	// 拼接字符串 sha1 加密
    	$tmpStr = sha1(join($tmpArr));
    	// 加密签名的比较
    	if ($tmpStr == $signature) {
    		echo $echostr;
    	} else {
    		echo 'error';
    		exit;
    	}

    	// 接收xml数据
  //   	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
  //   	if (!$postStr) {
  //   		echo 'post data error';
  //   		exit;
  //   	}

  //   	$postObj = simplexml_load_string($postStr, 'SimpleXmlElement', LIBXML_NOCDATA);
  //   	$MsgType = $postObj->MsgType;
  //   	$xml = '
		// 	<xml>
		// 		<ToUserName>< ![CDATA['.$postObj->FromUserName.'] ]></ToUserName>
		// 		<FromUserName>< ![CDATA['.$postObj->ToUserName.'] ]></FromUserName>
		// 		<CreateTime>'.time().'</CreateTime>
		// 		<MsgType>< ![CDATA[text] ]></MsgType>
		// 		<Content>< ![CDATA['.$postObj->MsgType.'] ]></Content>
		// 	</xml>';
  //   	// switch ($MsgType) {
  //   	// 	case 'text':
  //   	// 		$xml = '
	 //    // 			<xml>
	 //    // 				<ToUserName>< ![CDATA['.$postObj->FromUserName.'] ]></ToUserName>
	 //    // 				<FromUserName>< ![CDATA['.$postObj->ToUserName.'] ]></FromUserName>
	 //    // 				<CreateTime>'.time().'</CreateTime>
	 //    // 				<MsgType>< ![CDATA[text] ]></MsgType>
	 //    // 				<Content>< ![CDATA['.$postObj->MsgType.'] ]></Content>
	 //    // 			</xml>';
  //   	// 		break;
    		
  //   	// 	default:
  //   	// 		# code...
  //   	// 		break;
  //   	// }
		// echo $xml;
    }
}
