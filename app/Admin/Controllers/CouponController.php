<?php

namespace App\Admin\Controllers;

use App\Model\CouponModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\CouponModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponModel);

        $grid->column('c_id', __('C id'));
        $grid->column('c_name', __('优惠券说明'));
        $grid->column('c_num', __('数量'));
        $grid->column('type', __('类型'));
        $grid->column('c_money', __('满金额'));
        $grid->column('minute', __('减金额'));
        $grid->column('last_time', __('过期时间'));

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
        $show = new Show(CouponModel::findOrFail($id));

        $show->field('c_id', __('C id'));
        $show->field('c_name', __('优惠券说明'));
        $show->field('c_num', __('数量'));
        $show->field('type', __('类型'));
        $show->field('c_money', __('满金额'));
        $show->field('minute', __('减金额'));
        $show->field('last_time', __('过期时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponModel);

        $form->text('c_name', __('优惠券说明'));
        $form->number('c_num', __('数量'));
        $form->select('type', '类型')->options([1 => '满减',2 => '固定金额',3 => '折扣劵']);
        $form->number('c_money', __('满金额'));
        $form->number('minute', __('减金额'));
        $form->datetime('last_time', __('过期时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
