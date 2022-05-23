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
<style> body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
</style>
<body>
    <div class="containter">
     
        <ul>
        <h2>DANH SÁCH LOẠI LÝ THUYẾT</h2>
        <a class="fas fa-home"  href="/admin/TrangChu">Trang Chủ</a> </br></br> 
        <button onclick="location.href='/admin/createLoaiLyThuyet'">Thêm Loại Lý Thuyết</button> 
            <p></p>
            <table border="1">  
               <tr>
                <th>id</th>
                <th>Ten Loai LT</th>
                <th>Icon</th> 
                <th>Action</th>
               </tr>
               <tr>
                   @foreach($list_LLT as $item)
                   <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->TenLoaiLT}}</td>
                       <td>{{$item->Icon}}</td> 
                       <td>
                           <button id="delete"  onclick="DeleteLLT('{{$item->id}}')">Xóa</button>
                         
                           <button onclick="UpdateLLT('{{$item->id}}')">Sửa</button> 
                        </td>
                   </tr>
                   @endforeach
               </tr>
            </table>
            
        </ul>
    </div>
</body>
<script>
    function DeleteLLT(id){
        var txt ;
        if(confirm("Bạn có thật sự muốn xóa?")){
           txt = $.ajax({
            type:"GET",
            url :"/admin/deleteLoaiLyThuyet/"+id,
            success: function(data){
                alert('xoa thanh cong!');
                location.reload();
            }, 
        }   
        )   
        }else{  
            alert("Hủy thao tác xóa!");
        }
        document.getElementByID("delete").innerHTML=txt;
    }
    function UpdateLLT(id){
        location.replace('/admin/updateLoaiLyThuyet/'+id) ;
        // var txt ;
        // if(confirm("Bạn có thật sự muốn sửa?")){
        //    txt = $.ajax({
        //     type:"GET",
        //     url :location.replace('/admin/updateLoaiLyThuyet/'+id) ,
            
        // }   
        // )   
        // }else{
        //     txt = "Hủy thao tác xóa!";
        // }
        // document.getElementByID("delete2").innerHTML=txt;
    }
     
</script>
</html>