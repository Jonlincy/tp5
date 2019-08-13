<?php
namespace app\common\model;

use think\model as BaseModel;
class TestModel extends BaseModel
{
    protected $name = 'test';

    public function insertInfo()
    {
        $data = [
            'age' => mt_rand(0,100),
            'name' => $this->getMyName(),
            'address' => md5($this->getMyName(10))
        ];
        return $this->insertGetId($data);
    }

    private function getMyName($length = 7)
    {
        $letter = range('A','z');
        $number = range(0,9);
        $strArr = array_merge($letter,$number);

        $str = '';
        for ($i = 0; $i < $length; $i++ )
        {
            $str .= $strArr[mt_rand(0,67)];
        }
        return $str;
    }

}