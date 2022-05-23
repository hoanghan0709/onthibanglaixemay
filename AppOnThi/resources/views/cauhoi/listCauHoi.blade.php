<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Document</title>
</head>
<style>
    .a{
        text-align: center;
    }
    body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
</style>
<body>
    
    <div class="containter">
                
    
        <ul><h2 class="a">DANH SÁCH CÁC CÂU HỎI</h2>
        <a class="fas fa-home"  href="/admin/TrangChu">Trang Chủ</a> </br></br>
         <button onclick="ThemCH()">Thêm Mới</button> </br> </br>
            <table border="1">  
               <tr>
                <th>id</th>
                <th>Tên Câu Hỏi</th>
                <th>Nội dung CH</th>
                <th>Hình Ảnh</th>
                <th>Đáp án đúng</th>
                <th>Đáp án A</th>
                <th>Đáp án B</th>
                <th>Đáp án C</th>
                <th>Đáp án D</th>
                <th>Giải Thích</th>
                <th>id loại lý thuyết</th>
                <th>Action</th>
               </tr>
               <tr>
                   @foreach($list as $item)
                   <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->TenCH}}</td>
                       <td>{{$item->NoiDungCH}}</td>
                       <td>{{$item->HinhAnh}}</td>
                       <td>{{$item->DapAnDung}}</td>
                       <td>{{$item->DapAnA}}</td>
                       <td>{{$item->DapAnB}}</td>
                       <td>{{$item->DapAnC}}</td>
                       <td>{{$item->DapAnD}}</td>
                       <td>{{$item->GiaiThich}}</td>
                       <td> {{$item->id_LLT}} </td>
                       <td>
                           <button id="delete" onclick="DeleteCH('{{$item->id}}')">Xóa</button>
                         
                           <button onclick="UpdateCH('{{$item->id}}')">Sửa</button>
                          
                          
                        </td>
                   </tr>
                   @endforeach
               </tr>
            </table>
            
        </ul>
    </div>
</body>
<script>
    function DeleteCH(id){
        var txt;
        if(confirm("Bạn có thật sự muốn xóa?")){
                txt=  $.ajax({
            type:"GET",
            url :"/admin/deleteCauHoi/"+id,
            success: function(data){
                alert('xoa thanh cong!');
                location.reload();
            }, 
        }   
        )  
        }else{
            alert("Hủy thao tác xóa");
        }
        document.getElementById("delete").innerHTML(txt);
    }
    function UpdateCH(id){
        location.replace('/admin/updateCauHoi/'+id);
    }
    function ThemCH(id){
        location.replace('/admin/createCauHoi/');
    }
</script>
</html>