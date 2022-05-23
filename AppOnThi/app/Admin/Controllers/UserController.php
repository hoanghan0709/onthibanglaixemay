<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('id'));
        $grid->column('HoTenUser', __('HoTenUser')); 
        $grid->column('email', __('email')); 
        $grid->column('password', __('password'));  
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('HoTenUser', __('HoTenUser')); 
        $show->field('email', __('email')); 
        $show->field('password', __('password'));  

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());   
        $form->display('id',__('id'));
        $form->text('HoTenUser', __('HoTenUser')); 
        $form->email('email', __('email')); 
        $form->password('password', __('password')); 

        return $form;
    }
}
