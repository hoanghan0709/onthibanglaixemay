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
    .wrap_form{
        display: flex;
        justify-content: space-between;
        max-width: 300px;
    }
    .a{
        text-align: center;
    }
    .ab{
        
        text-decoration: none;
    }
    body{
    background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
} 
</style>
<body>
    <div class="containter">
        <ul>
            <h2 class="a">DANH SÁCH BÀI THI</h2>
       
            <a class="ab fas fa-home"  href="/admin/TrangChu">Trang Chủ</a> </br></br>

 
        <button onclick="location.href='/admin/createBaiThi'">Thêm Bài Thi</button>
            </br>
            </br>
            <table border="1">  
               <tr>
                <th>id</th>
                <th>Tên Bài Thi</th>
                <th>Phút</th>
                <th>Giây</th>
                <th>Điểm</th>
                <th>Kết quả</th>
                <th>Action</th>
               </tr>
               <tr>
                   @foreach($list as $item)
                   <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->TenBT}}</td>
                       <td>{{$item->Phut}}</td>
                       <td>{{$item->Giay}}</td>
                       <td>{{$item->Diem}}</td>
                       <td>{{$item->KetQua}}</td>
                       <td>
                           <button id="delete" onclick="DeleteBT('{{$item->id}}')">Xóa</button> 
                           <button onclick="UpdateBT('{{$item->id}}')">Sửa</button>
                           <button  id="add" onclick="ThemCHBT('{{$item->id}}')">Thêm Câu Hỏi Vào Bài Thi</button>     
                        </td>
                   </tr>
                   @endforeach
               </tr>
            </table>
            
        </ul>
    </div>
</body>
<script>
    function DeleteBT(id){
        var txt;
        if(confirm("Bạn có thật sự muốn xóa")){
            txt=$.ajax({
            type:"GET",
            url :"/admin/deleteBaiThi/"+id,
            success: function(data){
                alert('xoa thanh cong!');
                location.reload();
            },error: function(data){
                alert("Xóa thất bại");
            } } ) 
        } else{
            alert("Hủy thao tác xóa");
        }
        document.getElementById("delete").innerHTML(txt);
    }
    function UpdateBT(id){
        location.replace('/admin/updateBaiThi/'+id);
    }
    function ThemCHBT(id){
       var txt;
       if(confirm("Bạn có muốn thêm câu hỏi vào bài thi ?")){
           txt= location.replace('/admin/CauHoiBaiThi/'+id);
       }else{
           alert("Hủy thao tác thêm câu hỏi vào bài thi!");
       }
       document.getElementById("add").innerHTML(txt);
    }
</script>
</html>