<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
class CommentCheck extends RowAction
{
    public $name = '审核';

    public function handle(Model $model)
    {
        //获取用户id
        $id = $model->id;
        $bool = (new Comment())->changeStateById($id,1);
        $saying = '审核中';
        if ($bool) {
            $saying = '审核成功';
        } else {
            $saying = '审核失败';
        }
        return $this->response()->success($saying)->refresh();
    }

    public function dialog()
    {
        $this->confirm('确定审核该评论？');
    }
}
