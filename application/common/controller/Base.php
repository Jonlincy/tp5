<?php

namespace app\common\controller;

use think\Controller;

class Base extends Controller
{
    public function returnJsonUtil($code,$msg,$data = [])
    {
        if (empty($msg)) {
            switch ($code) {
                case 200:
                    $msg = '成功';
                    break;
                case 400:
                    $msg = '参数错误';
                    break;
                case 403:
                    $msg = '没有权限';
                    break;
                case 404:
                    $msg = '返回值为空';
                    break;
                case 500:
                    $msg = '服务器内部错误';
                    break;
                case 777:
                    $msg = '请先登录再执行该操作';
                    break;
                case 999:
                    $msg = '非法登录';
                    break;
                default:
                    $msg = '错误信息';
            }
        }
        $returnData['code'] = $code;
        $returnData['msg'] = $msg;
        $returnData['data'] = $data;
        die( json_encode($returnData, JSON_UNESCAPED_UNICODE));
    }

}