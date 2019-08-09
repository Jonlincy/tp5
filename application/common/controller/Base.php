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
                    $msg = '�ɹ�';
                    break;
                case 400:
                    $msg = '��������';
                    break;
                case 403:
                    $msg = 'û��Ȩ��';
                    break;
                case 404:
                    $msg = '����ֵΪ��';
                    break;
                case 500:
                    $msg = '�������ڲ�����';
                    break;
                case 777:
                    $msg = '���ȵ�¼��ִ�иò���';
                    break;
                case 999:
                    $msg = '�Ƿ���¼';
                    break;
                default:
                    $msg = '������Ϣ';
            }
        }
        $returnData['code'] = $code;
        $returnData['msg'] = $msg;
        $returnData['data'] = $data;
        die( json_encode($returnData, JSON_UNESCAPED_UNICODE));
    }

}