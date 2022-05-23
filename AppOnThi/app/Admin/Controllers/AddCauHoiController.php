<?php

namespace App\Admin\Controllers;
use App\Models\CauHoi;
use App\Models\BaiThi;
use App\Models\AddCauHoi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Admin;
use Encore\Admin\Show;
use App\Admin\Controllers\CheckRow;

class AddCauHoiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Thêm câu hỏi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CauHoi());

        $grid->column('id', __('id'));
        $grid->column('TenCH', __('TenCH'));
        $grid->column('NoiDungCH', __('NoiDungCH'));
        $grid->column('DapAnDung', __('DapAnDung'));
        $grid->column('DapAnLiet', __('DapAnLiet'));
        $grid->column('DapAnA', __('DapAnA'));
        $grid->column('DapAnB', __('DapAnB'));
        $grid->column('DapAnC', __('DapAnC'));
        $grid->column('DapAnD', __('DapAnD')); 
        $grid->column('id_LLT', __('id_LLT'));
        $grid->actions(function ($actions) {
            $actions->disableView();
                Admin::js('vendor/laravel-admin/AdminLTE/dist/js/customize.js');
              //  Admin::script('alert("hello world");');
              

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
        $show = new Show(AddCauHoi::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Formw
     */
    protected function form()
    {
        $form = new Form(new BaiThi);

       // $form->multipleSelect(<roles<,<Role<)->options(Role::all()->pluck(<name<,<id<));
        // or
        $form->checkbox('cau_hois','Cau Hoi')->options(CauHoi::all()->pluck('TenCH','id'));
        $form->checkbox('bai_this','Cau Hoi')->options(BaiThi::all()->pluck('TenBT','id'));

        return $form;
    }
}
