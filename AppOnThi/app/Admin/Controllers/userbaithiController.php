<?php

namespace App\Admin\Controllers;

use App\Models\userbaithi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class userbaithiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'userbaithi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new userbaithi());

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('id_BT', __('id_BT'));
        $grid->column('id', __('id'));
        $grid->actions(function ($actions) {
            $actions->disableAddCH();
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
        $show = new Show(userbaithi::findOrFail($id));

        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('id_BT', __('id_BT'));
        $show->field('id', __('id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new userbaithi());
        
        $form->number('id_BT', __('id_BT'));
        $form->number('id', __('idUser')); 
        $form->number('id', __('id')); 
        return $form;
    }
}
