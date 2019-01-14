<?php
define("TOKEN","weixin");
$wechatobj=new wechatCallbackapiTest();
//(1)先验证
$wechatobj->valid();
//(2)验证成功后注释掉valid(),开启自动回复功能
//$wechatobj->responseMsg();
class wechatCallbackapiTest
{
    public function valid(){
        $echoStr=$_GET["echostr"];
        //进行用户数字签名验证
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    //定义自动回复功能
    public function responseMsg(){
        //接收用户端发送的XML数据
        $postStr=$GLOBALS["HTTP_RAW_POST_DATA"];
        //判断XML数据是否为空
        if(!empty($postStr)){
            libxml_disable_entity_loader(true);
            //通过simplexml进行xml解析
            $postObj=simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
           //微信手机端
            $fromUsername=$postObj->FromUserName;
           //微信公众平台
            $toUsername=$postObj->ToUserName;
            //接收用户发送关键词
            $keyword=trim($postObj->Content);
            $time=time();
            $textTpl="<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      <Content><![CDATA[%s]]></Content>
                      <FuncFlag>0</FuncFlag>
                      </xml>";
            if(!empty($keyword)){
                $msgType="text";
                $contentStr="Welcome to wechat world!";
                $resultStr=sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,$contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
        }else{
            echo "";
            exit;
        }
    }

    private function checkSignature(){
        //判断token密钥是否定义
        if(!defined("TOKEN")){
            throw new Exception('TOKEN is not defined');
        }
        $signature=$_GET["signature"];//微信加密签名
        $timestamp=$_GET["timestamp"];//时间戳
        $nonce=$_GET["nonce"];//随机数
        $token=TOKEN;
        $tmpArr=array($token,$timestamp,$nonce);
       //通过字典法进行排序
        sort($tmpArr,SORT_STRING);
        $tmpStr=implode($tmpArr);
        $tmpStr=sha1($tmpStr);
        if($tmpStr==$signature){
            return true;
        }else{
            return false;
        }
    }
}