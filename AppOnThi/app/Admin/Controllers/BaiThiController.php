<?php

namespace App\Admin\Controllers;

use App\Models\BaiThi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BaiThiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Danh sách các bài thi ';

    /**
     * Make a grid builder.
     *wwwwwaa
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BaiThi()); 

        $grid->column('id', __('id'));
        $grid->column('TenBT', __('TenBT'));
        $grid->column('Phut',__('Phut'));
        $grid->column('Giay',__('Giay'));
        $grid->column('Diem',__('Diem'));
        $grid->column('KetQua',__('KetQua'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->batchActions(function ($batch) {
            $batch->disableDelete();
        });$grid->disableColumnSelector();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->actions(function ($actions) {
            
            $actions->disableView();
          });
          
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
        $show = new Show(BaiThi::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('TenBT', __('TenBT'));
        $show->field('Phut', __('Phut'));
        $show->field('Giay', __('Giay'));
        $show->field('Diem', __('Diem'));
        $show->field('KetQua', __('KetQua'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BaiThi());

        $form->display('id', __('id'));
        $form->text('TenBT', __('TenBT'));
        $form->text('Phut', __('Phut'));
        $form->text('Giay', __('Giay'));
        $form->text('Diem', __('Diem'));
        $form->text('KetQua', __('KetQua'));
        
        return $form;
    }
}
