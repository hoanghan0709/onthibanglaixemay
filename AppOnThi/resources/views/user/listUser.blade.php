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
<style>
    .a{
        text-align: center;
    }
    body{  
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .ab{
        
        text-decoration: none;
    }
    .b{
        margin-left: 50px;
    }
</style>
<body>
   <div  class="container">
       <h2 class="a">DANH SÁCH USER</h2>
       <a class="ab b fas fa-home"  href="/admin/TrangChu">Trang Chủ</a> </br></br>
   <table class="b" border="1">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Password</th>     
            <th>Action</th>     
        </tr>
        <tr>  
            @foreach($list as $item) 
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->HoTenUser}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->password}}</td>
                    <td>
                        <button id="delete" onclick="DeleteUser('{{$item->id}}')"> Xóa</button>
                        <button id="add" onclick="AddBaiThiUser('{{$item->id}}')">Thêm bài thi vào user</button>
                        
                    </td>
                </tr>

        
            @endforeach
        </tr>

    </table>
   </div>
</body>
<script>
    function DeleteUser(id){
        var txt;
        if(confirm("Bạn có thật sự muốn xóa")){
            txt=$.ajax({
            type:"GET",
            url :"/admin/deleteUser/"+id,
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
    function AddBaiThiUser(id){
         location.replace('/admin/BaiThiUser/'+id);
    }
</script>
</html>