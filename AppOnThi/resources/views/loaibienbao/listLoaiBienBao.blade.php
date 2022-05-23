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
    body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .a{
        text-align: center;
    }
    .b{
        margin-left: 50px;
    }
</style>
<body class="b">
    <h2 class="a"> DANH SÁCH LOẠI BIỂN BÁO</h2>
<a class="fas fa-home" href="/admin/TrangChu">Trang Chủ</a> </br></br>
        
        <button onclick="ThemLBB()">Thêm mới</button> </br> </br>
    <table border="1">
            <tr>
                <th>id</th>
                <th>Tên loại biển báo</th>
                <th>Action</th>
            </tr>
            <tr>
                @foreach($LoaiBienBao as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->TenLoaiBB}}</td>
                    <td>
                        <button onclick="updateLoaiBienBao('{{$item->id}}')">Sửa</button>
                        <button id="delete" onclick="DeleteLBB('{{$item->id}}')">Xóa</button>
                    
                        
                    </td>
                </tr>
                @endforeach
            </tr>
    </table>
   
    
</body>
<script>
      function DeleteLBB(id){
          var txt;
          if(confirm("Bạn có thật sự muốn xóa?")){
              txt=$.ajax({
            type:"GET",
            url:"/admin/deleteLoaiBienBao/"+id, 
            success:function(data){
                    alert('xoa thanh cong');
                    location.reload();
            },error:function(data){
                    alert('xoa that bai');
                     
            }
        })
          }else{
              alert("hủy thao tác xóa!")
          }
        document.getElementById("delete").innerHTML(txt);
    } 
    function updateLoaiBienBao(id){
        location.replace('/admin/updateLoaiBienBao/'+id);
    }
     
    function ThemLBB(){
        location.replace('/admin/createLoaiBienBao');
    }
</script>
</html> 