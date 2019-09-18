<?php

namespace App\Admin\Controllers;

<<<<<<< HEAD
=======
use App\Model\Cate;
>>>>>>> goods
use App\Model\Goods;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Redis;
>>>>>>> goods

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
<<<<<<< HEAD
        $grid->column('goods_img', __('Goods img'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('describe', __('Describe'));
        $grid->column('goods_prie', __('Goods prie'));
        $grid->column('market_price', __('Market price'));

=======
        $grid->column('goods_img')->image('http://www.shop.com/uploads/',50,50);
        $grid->column('describe', __('Describe'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('goods_prie', __('Goods prie'));
        $grid->column('market_price', __('Market price'));
        // 全部关闭
//        $grid->disableActions();
        $grid->actions(function ($actions) {
            // append一个操作
            $actions->append('<a href=""><i class="fa fa-eye">修改</i></a>');

            // prepend一个操作
            $actions->prepend('<a href=""><i class="fa fa-paper-plane">删除</i></a>');
        });
>>>>>>> goods
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
<<<<<<< HEAD
        $show->field('goods_img', __('Goods img'));
=======
        $show->field('goods_img', __('Goods img'))->image('http://www.shop.com/uploads/',50,50);
>>>>>>> goods
        $show->field('cate_id', __('Cate id'));
        $show->field('describe', __('Describe'));
        $show->field('goods_prie', __('Goods prie'));
        $show->field('market_price', __('Market price'));
<<<<<<< HEAD

=======
//        dump(Redis::zRange('num',0,100));

        $num=Redis::zScore('num',$id);

        if(!$num){
            Redis::zAdd('num',1,$id);
        }
//
            Redis::zAdd('num',$num+1,$id);

        dump($num);
>>>>>>> goods
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
<<<<<<< HEAD

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->text('goods_img', __('Goods img'));
        $form->number('cate_id', __('Cate id'));
=======
        $form->text('goods_name', __('Goods name'));
//        $form->file('goods_img');
        $form->image('goods_img');
        $form->select('cate_id','分类')->options(Cate::selectOptions());
>>>>>>> goods
        $form->textarea('describe', __('Describe'));
        $form->number('goods_prie', __('Goods prie'));
        $form->number('market_price', __('Market price'));

        return $form;
    }
}
