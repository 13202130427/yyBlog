<?php

namespace App\Admin\Controllers;

use App\Models\Article;
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

        $form->text('title', __('Title'));
        $form->text('tag_ids', __('Tag ids'));
        $form->number('image_id', __('Image id'));
        $form->number('content_id', __('Content id'));
        $form->text('show_content', __('Show content'));
        $form->text('author', __('Author'));
        $form->number('read_num', __('Read num'));
        $form->number('comment_num', __('Comment num'));
        $form->switch('is_top', __('Is top'));

        return $form;
    }
}
