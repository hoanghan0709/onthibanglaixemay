<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Document</title>
</head>
<style>body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .a{
        text-align: center;
    }
    .b{
        margin-left: 50px;
    }
</style>
<body>
    <h2 class="a">DANH SÁCH CÁC LOẠI MẸO THI</h2>
<a class="b fas fa-home" href="/admin/TrangChu">Trang Chủ</a> </br></br> 
    <button class="b" onclick="ThemLoaiMeoThi()">Thêm mơi</button> </br></br>
        <table class="b" border="1">

        <tr>
            <th>id Mẹo thi</th> 
            <th>Tên Loại Mẹo thi</th> 
            <th>Action</th> 
        </tr>
        <tr>
            @foreach($list as $item)
            <tr> 
                <td>{{$item->id}}</td>
                <td>{{$item->TenMeoThi}}</td>
                <td>
                        <button onclick="UpdateLoaiMeoThi('{{$item->id}}')">Sửa</button>
                        <button id="delete" onclick="DeleteLoaiMeoThi('{{$item->id}}')">Xóa</button>
                       
                       
                </td>
            @endforeach    
           
            </tr>
        </tr>

        </table>
</body>
<script>
    function ThemLoaiMeoThi(){
            location.replace("/admin/createLoaiMeoThi");
    }
    function UpdateLoaiMeoThi(id){
            location.replace('/admin/updateLoaiMeoThi/'+id);
    }
    function DeleteLoaiMeoThi(id){   
         var txt;
         if(confirm("Bạn có thật sự muốn xóa ?")){
                    txt= $.ajax({
                type:"GET",
                url:"/admin/deleteLoaiMeoThi/"+id,
                success: function(data){
                    alert("xoa  thanh cong");
                    location.replace("/admin/listLoaiMeoThi");
                },   error: function(data){
                    alert("xoa khong thanh cong"); 
                }
            })
         }else{
                alert("Hủy thao tác xóa !");
         }
           document.getElementById("delete").innerHTML(txt);
    }
</script>
</html>