<?php

namespace App\Admin\Actions\Post;

use App\Http\Controllers\Api\V1\Wx\ToolController;
use App\Models\Client;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = '审核';

    public function handle(Model $model)
    {
        //获取用户id
        $id = $model->id;
        $bool = (new Client())->changeStateById($id,1);
        $saying = '审核中';
        if ($bool) {
            $saying = '审核成功';
            //用户邮箱
            $to = $model->email;
            ToolController::sendEmail($to,'您的账号可以正常使用');
        } else {
            $saying = '审核失败';
        }
        return $this->response()->success($saying)->refresh();
    }

    public function dialog()
    {
        $this->confirm('确定审核该用户？');
    }
}
