<?php

namespace App\Admin\Controllers;

use App\Models\MeoThi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MeoThiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MeoThi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MeoThi());
        $grid->column('id', __('id'));
        $grid->column('NoiDung', __('NoiDung'));
        $grid->column('Ten', __('Ten'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('id_LoaiMT',__('id_LoaiMT'));
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
        $show = new Show(MeoThi::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('NoiDung', __('NoiDung'));
        $show->field('Ten', __('Ten'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('id_LoaiMT',__('id_LoaiMT'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MeoThi());

        $form->display('id', __('id'));
        $form->text('NoiDung', __('NoiDung'));
        $form->text('Ten',__('Ten'));
        $form->text('created_at', __('Created at'));
        $form->text('updated_at', __('Updated at'));
        $form->number('id_LoaiMT',__('id_LoaiMT'));
        return $form;
    }
}
