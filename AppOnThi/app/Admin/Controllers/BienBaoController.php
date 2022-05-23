<?php

namespace App\Admin\Controllers;

use App\Models\LoaiBienBao;
use App\Models\BienBao;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BienBaoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BienBao';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BienBao());

        $grid->column('id', __('id'));
        $grid->column('TenBB', __('TenBB'));
        $grid->column('NoiDungBB', __('NoiDungBB'));
        $grid->column('HinhAnhBB', __('HinhAnhBB')); 
       
        $grid->column('id_LoaiBB',__('id_LoaiBB'));
        
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
        $show = new Show(BienBao::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('TenBB', __('TenBB'));
        $show->field('NoiDungBB', __('NoiDungBB'));
        $show->field('HinhAnhBB', __('HinhAnhBB'));
       
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('id_LoaiBB',__('id_LoaiBB'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BienBao());

        $form->display('id', __('id'));
        $form->text('TenBB', __('TenBB'));
        $form->text('NoiDungBB', __('NoiDungBB'));
        $form->text('HinhAnhBB', __('HinhAnhBB'));
        
        $form->text('created_at', __('Created at'));
        $form->text('updated_at', __('Updated at'));
        $form->number('id_LoaiBB',__('id_LoaiBB'));

        return $form;
    }
}
