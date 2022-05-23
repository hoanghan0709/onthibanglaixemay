<?php

namespace App\Admin\Controllers;

use App\Models\LoaiMeoThi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LoaiMeoThiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LoaiMeoThi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LoaiMeoThi());

       
        $grid->column('id', __('id'));
        $grid->column('TenMeoThi', __('TenMeoThi'));
        
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function ($actions) {
            $actions->disableAddCH();
            
                $actions->disableView();
             
        });$grid->disableColumnSelector();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableFilter();
         
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
        $show = new Show(LoaiMeoThi::findOrFail($id)); 

        $show->field('id', __('id'));
        $show->field('TenMeoThi', __('TenMeoThi'));
        
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
        $form = new Form(new LoaiMeoThi());

        $form->display('id', __('id'));
        $form->text('TenMeoThi', __('TenMeoThi'));
        
        $form->text('created_at', __('Created at'));
        $form->text('updated_at', __('Updated at'));



        return $form;
    }
}
