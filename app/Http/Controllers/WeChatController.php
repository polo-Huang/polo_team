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
    }
}
