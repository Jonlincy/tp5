<?php
namespace app\common\command;

use app\common\model\TestModel;
use think\console\Command;
use think\console\Input;
use think\console\Output;
class InsertInfo extends Command
{
    protected function configure()
    {
        // ָ������
        $this->setName('insertInfo')
            ->setDescription('insert info to mysql for test');
        // ���ò���

    }

    /**
     * ȡ����ʱ����
     * @param Input $input
     * @param Output $output
     * @return bool|int|null
     */
    protected function execute(Input $input, Output $output)
    {
        try{
            $testModel = new TestModel();
            $testModel->insertInfo();
            return true;
        }catch (\Exception $e){
            $output->writeln("cancel Order error");
            print_r('Appear Exception:'.$e->getMessage());
            return false;
        }
    }
}