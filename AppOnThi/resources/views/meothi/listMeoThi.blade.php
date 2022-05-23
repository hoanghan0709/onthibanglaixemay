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
        <h2 class="a">DANH SÁCH CÁC MẸO THI</h2>
        
<a class="b fas fa-home" href="/admin/TrangChu">Trang Chủ</a></br></br>
    <table border="1">
        
        <button class="b" onclick="ThemMeoThi()">Thêm mẹo thi</button></br></br>
        <tr>
            <th>id</th>
            <th>Tên Mẹo Thi</th>
            <th>Nội Dung</th>
            <th>id Loại Mẹo thi</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->Ten}}</td>
                <td>{{$item->NoiDung}}</td>
                <td>{{$item->id_LoaiMT}}</td>
                <td>
                    <button onclick="UpdateMeoThi('{{$item->id}}')">Sửa</button>
                    <button id="delete" onclick="DeleteMeoThi('{{$item->id}}')">Xóa</button>
                
                </td>
            </tr>
            @endforeach
        </tr>
        
    </table>
    
</body>
<script>
    function ThemMeoThi(){
            location.replace('/admin/createMeoThi');
    }
    function UpdateMeoThi(id){
        location.replace('/admin/updateMeoThi/'+id);
    }
    function DeleteMeoThi(id){
        var txt;
        if(confirm("Bạn có thật sự muốn xóa?"))
        {
             txt =$.ajax({
            type:"GET",
            url:"/admin/deleteMeoThi/"+id,
            success: function(data){
                alert("delete thanh cong");
                location.reload();
            },error: function(data){
                alert("delete that bai");
            } 
        })
        }else{
                alert("Huỷ thao tác xóa !");
        }
        document.getElementById("delete").innerHTML(txt);
    }
</script>
</html>