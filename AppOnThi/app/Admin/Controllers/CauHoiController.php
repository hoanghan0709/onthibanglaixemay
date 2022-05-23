<?php

namespace App\Admin\Controllers;

use App\Models\CauHoi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
class CauHoiController extends AdminController //vào cái này
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CauHoi';

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
        $grid->column('HinhAnh',_('HinhAnh')); 
        $grid->column('DapAnA', __('DapAnA'));
        $grid->column('DapAnB', __('DapAnB'));
        $grid->column('DapAnC', __('DapAnC'));
        $grid->column('DapAnD', __('DapAnD'));
        $grid->column('GiaiThich', __('GiaiThich'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('id_LLT', __('id_LLT'));
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
        $show = new Show(CauHoi::findOrFail($id));

        $show->field('id', __('id'));
        $show->field('TenCH', __('TenCH'));
        $show->field('NoiDungCH', __('NoiDungCH'));
        $show->field('DapAnDung', __('DapAnDung')); 
        $show->field('HinhAnh',_('HinhAnh')); 
        $show->field('DapAnA', __('DapAnA'));
        $show->field('DapAnB', __('DapAnB'));
        $show->field('DapAnC', __('DapAnC'));
        $show->field('DapAnD', __('DapAnD'));
        $show->field('GiaiThich', __('GiaiThich'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('id_LLT', __('id_LLT'));
    
        return $show;
       
    }
//s 
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()    
    {
        $form = new Form(new CauHoi());
        
        $form->display('id', __('id'));
        $form->text('TenCH', __('TenCH'));
        $form->text('NoiDungCH', __('NoiDungCH'));
        $form->text('DapAnDung', __('DapAnDung')); 
        $form->text('HinhAnh',_('HinhAnh')); 
        $form->text('DapAnA', __('DapAnA'));
        $form->text('DapAnB', __('DapAnB'));
        $form->text('DapAnC', __('DapAnC'));
        $form->text('DapAnD', __('DapAnD'));
        $form->text('GiaiThich', __('GiaiThich'));
        $form->text('id_LLT', __('id_LLT'));
        // truy vấn trong db // xuất ra thông báo 
        return $form; // $form này trả về chỗ nào vậy
    }// select id_LLT 
      
    // public function mess(){
    //     $cauhoi = DB::table('cau_hois')->
    //     join('loai_ly_thuyets','cau_hois.id_LLT','=','loai_ly_thuyets.id')->select('cau_hois.id_LLT','loai_ly_thuyets.id')->delete();
    //     if($cauhoi){
    //         echo $cauhoi -> {"khong xoa duoc"};
    //     }
          

    // }
}
