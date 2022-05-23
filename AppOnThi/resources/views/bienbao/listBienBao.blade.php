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

    }</style>
<body>
 <div class="container">
     
    <ul>
        <h2>DANH SÁCH CÁC BIỂN BÁO</h2>
    <a class="fas fa-home"  href="/admin/TrangChu">Trang Chủ</a> 
    </br>
    </br>
  
    <button onclick="ThemBB()">Thêm Mới</button>   </br>  </br>
        <table border="1">
                <tr>
                    <th> id </th>
                    <th> Tên Biển Báo </th>
                    <th> Nội Dung Biển Báo </th>
                    <th> Hình Ảnh Biển Báo </th>
                    <th> id Loại Biển Báo </th>
                    <th>Action </th>
                </tr>
                <tr>
                    @foreach($bienbaoo as $bb)
                    <tr>
                        <td>{{$bb->id}}</td>
                        <td>{{$bb->TenBB}}</td>
                        <td>{{$bb->NoiDungBB}}</td>
                        <td>{{$bb->HinhAnhBB}}</td>
                        <td>{{$bb->id_LoaiBB}}</td>
                        <td>
                            <button id="delete" onclick="DeleteBB('{{$bb->id}}')">Xóa</button>
                            
                            <button onclick="UpdateBB('{{$bb->id}}')">Sửa</button>
                        </td>
                    </tr>
                    @endforeach
                </tr>
        </table>
    </ul>
 </div>
    

</table>
</body>
<script>
    function DeleteBB(id){
        var txt;
        if(confirm("Bạn có thật sự muốn xóa?")){
            txt=$.ajax({
            type: "GET",
            url:"/admin/deleteBienBao/"+id, 
            success:function(data){
                    alert('xoa thanh cong');
                    location.reload();
            },error:function(data){
                    alert('xoa that bai');
                     
            }
        })
        }else{
            alert("Hủy bỏ thao tác xóa");
        }
        document.getElementById("delete").innerHTML(txt);
    } 
    function UpdateBB(id){ 
            location.replace('/admin/updateBienBao/'+id);
        
    }
    function ThemBB(){
         location.replace('/admin/createBienBao');
    }

</script>
</html>