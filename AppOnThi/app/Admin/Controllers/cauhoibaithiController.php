<?php

namespace App\Admin\Controllers;

use App\Models\cauhoibaithi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BaiThi;
use App\Models\CauHoi;
class cauhoibaithiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'cauhoibaithi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
       $grid = new Grid(new cauhoibaithi());

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('id_CH', __('id_CH'));
        $grid->column('id', __('id'));
         
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
        $show = new Show(cauhoibaithi::findOrFail($id));

        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('id_CH', __('id_CH'));
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
        $form = new Form(new cauhoibaithi());

        $form->number('id_CH', __('id_CH'));
        $form->number('id', __('id'));

        return $form;
    }
}
