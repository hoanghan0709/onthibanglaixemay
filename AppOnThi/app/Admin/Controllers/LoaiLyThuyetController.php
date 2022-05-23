<?php

namespace App\Admin\Controllers;

use App\Models\LoaiLyThuyet;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LoaiLyThuyetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LoaiLyThuyet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LoaiLyThuyet());

        $grid->column('id', __('id'));
        $grid->column('TenLoaiLT', __('TenLoaiLT'));
        $grid->column('Icon',_('Icon'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function ($actions) {
            $actions->disableAddCH();
            $actions->disableView();
          });
        $grid->disableColumnSelector();
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
        $show = new Show(LoaiLyThuyet::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('TenLoaiLT', __('TenLoaiLT'));
        $show->field('Icon',_('Icon'));
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
        $form = new Form(new LoaiLyThuyet());

        $form->number('id', __('id'));
        $form->text('TenLoaiLT', __('TenLoaiLT'));
        $form->text('Icon',_('Icon'));
       

        return $form;
    }
}
