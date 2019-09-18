<?php

namespace App\Admin\Controllers;

use App\Model\Goods;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\Goods';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Goods);

        $grid->column('goods_id', __('Goods id'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_img', __('Goods img'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('describe', __('Describe'));
        $grid->column('goods_prie', __('Goods prie'));
        $grid->column('market_price', __('Market price'));

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
        $show = new Show(Goods::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_img', __('Goods img'));
        $show->field('cate_id', __('Cate id'));
        $show->field('describe', __('Describe'));
        $show->field('goods_prie', __('Goods prie'));
        $show->field('market_price', __('Market price'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Goods);

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->text('goods_img', __('Goods img'));
        $form->number('cate_id', __('Cate id'));
        $form->textarea('describe', __('Describe'));
        $form->number('goods_prie', __('Goods prie'));
        $form->number('market_price', __('Market price'));

        return $form;
    }
}
