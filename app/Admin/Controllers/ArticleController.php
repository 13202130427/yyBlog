<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Simplemde;
use App\Models\Article;
use App\Models\Content;
use App\Models\Image;
use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;



class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', 'ID')->sortable();
        $grid->column('title','标题');
        $grid->column('tag_ids', '标签')->display(function ($tag_ids) {
            $tag = explode(',',$tag_ids);
            $str = '';
            foreach ($tag as $value) {
                $str .= '<span style="background-color: #aaaaaa;color:#fff;margin-left: 5px;padding:5px;border-radius: 2px;">' . Tag::find($value)->name . '</span>';
            }
            return $str;
        });
        $grid->column('image.url', '封面')->image('', 30, 30);
//        $grid->column('content_id', __('Content id'));
//        $grid->column('show_content', __('Show content'));
//        $grid->column('author', __('Author'));
//        $grid->column('read_num', __('Read num'));
//        $grid->column('comment_num', __('Comment num'));
//        $grid->column('is_top', __('Is top'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));
//        $grid->column('deleted_at', __('Deleted at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('tag_ids', __('Tag ids'));
        $show->field('image_id', __('Image id'));
        $show->field('content_id', __('Content id'));
        $show->field('show_content', __('Show content'));
        $show->field('author', __('Author'));
        $show->field('read_num', __('Read num'));
        $show->field('comment_num', __('Comment num'));
        $show->field('is_top', __('Is top'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->text('title', __('标题'))->required();
        $tag = Tag::pluck('name','id');
        $form->multipleSelect('tag_id','标签')->options($tag)->required();
        $form->image('image','封面')->required();
        $form->text('show_content', __('引语'))->required();
        $form->text('author', __('作者'))->required();
        $states = [
            'on' => ['value' => 1,'text' => '置顶','color' => 'success'],
            'off' => ['value' => 0,'text' => '不置顶','color' =>'danger']
        ];
        $form->switch('is_top', __('是否置顶'))->states($states);

        $form->editor('content','正文');

        return $form;
    }

    public function store()
    {
        $image = $_FILES['image'];
        if($image['error'] == 4) {
            admin_toastr('未上传封面','error');
            return false;
        }
        $file_name =date('Ymd').uniqid();
        $FILENAME = explode('.', $image['name']);
        $ext = end($FILENAME);
        $path = 'images/'.$file_name.'.'.$ext;
        if($image['error'] == 0){
            move_uploaded_file($image['tmp_name'],public_path('uploads/').$path);
            $imageModel = new Image();
            $imageModel->url = $path;
            $imageModel->save();
            $image_id = $imageModel->id;
        }else{
            admin_toastr('封面上传失败','error');
            return false;
        }
        $articleModel = new Article();
        $articleModel->title = $_POST['title'];
        $articleModel->tag_ids = trim(implode(',',$_POST['tag_id']),',');
        $articleModel->image_id = $image_id;
        $articleModel->show_content = $_POST['show_content'];
        $articleModel->author = $_POST['author'];
        $articleModel->is_top = $_POST['is_top'] == "off"? 0:1;
        $articleModel->save();
        $article_id = $articleModel->id;
        $path = '/uploads/sources/'.$article_id.'/';
        if(!is_dir($path)) {
            mkdir($path,0777,true);
        }
        file_put_contents('/uploads/sources/'.$article_id.'/article_detail.txt',$_POST['content']);
        Content::insert(['article_id' => $article_id,'url' => 'uploads/sources/'.$article_id.'/article_detail.txt']);
        admin_toastr('编写完成！','success');
        return true;
    }
}
