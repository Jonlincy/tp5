<?php
namespace app\index\controller;

use app\common\controller\Base;
use GatewayClient\Gateway;

class Index extends Base
{
    public function index()
    {
        return 'Hello Hjl,Today is ' . date('Y-m-d H:i:s');
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test()
    {
        $paramsArray = input('post.');
        if (!isset($paramsArray['username']))
        {
            return $this->returnJsonUtil(400,'用户名不能为空');
        }elseif (!isset($paramsArray['age']))
        {
            return $this->returnJsonUtil(400,'年龄不能为空');
        }

        $data = [
            'name' => $paramsArray['username'],
            'age'  => $paramsArray['age']
        ];
        return  $this->returnJsonUtil(200,'操作成功',$data);
    }

    public function bindUid()
    {
        try{
            // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值(ip不能是0.0.0.0)
            Gateway::$registerAddress = '127.0.0.1:1238';
            $postParamsArray = input('post.');
            if (!isset($postParamsArray['client_id']))
            {
                return $this->returnJsonUtil(400,'参数client_id不能为空');
            }

            if (!isset($postParamsArray['group_type']))
            {
                return $this->returnJsonUtil(400,'参数group_type不能为空');
            }
            $uId = rand(0,1000);
            Gateway::bindUid($postParamsArray['client_id'],$uId);
            Gateway::joinGroup($postParamsArray['client_id'],$postParamsArray['group_type']);
            return $this->returnJsonUtil(200,'绑定成功');
        }catch (\Exception $e)
        {
            return $this->returnJsonUtil(500,$e->getMessage());
        }

        return $this->returnJsonUtil(400,'其他错误');
    }
}
