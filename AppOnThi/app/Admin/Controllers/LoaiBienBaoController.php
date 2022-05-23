<?php

namespace App\Admin\Controllers;

use App\Models\LoaiBienBao;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LoaiBienBaoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LoaiBienBao';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LoaiBienBao());

        $grid->column('id', __('id'));
        $grid->column('TenLoaiBB', __('TenLoaiBB'));
        
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
        $show = new Show(LoaiBienBao::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('TenLoaiBB', __('TenLoaiBB'));
        
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
        $form = new Form(new LoaiBienBao());

        $form->display('id', __('id'));
        $form->text('TenLoaiBB', __('TenLoaiBB'));
        
        $form->text('created_at', __('Created at'));
        $form->text('updated_at', __('Updated at'));


        return $form;
    }
}
