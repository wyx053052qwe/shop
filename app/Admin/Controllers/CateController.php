<?php

namespace App\Admin\Controllers;

use App\Model\Cate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\Cate';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cate);

        $grid->column('cate_id', __('Cate id'));
        $grid->column('cate_name', __('Cate name'));
        $grid->column('soft', __('sopft'));
        $grid->column('cate_pid', __('Cate pid'));

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
        $show = new Show(Cate::findOrFail($id));

        $show->field('cate_id', __('Cate id'));
        $show->field('cate_name', __('Cate name'));
        $show->field('soft', __('sopft'));
        $show->field('cate_pid', __('Cate pid'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cate);

        $form->text('cate_name', __('Cate name'));
        $form->text('soft', __('sopft'));
        $form->select('cate_pid','分类')->options(Cate::selectOptions());
        return $form;
    }
}
