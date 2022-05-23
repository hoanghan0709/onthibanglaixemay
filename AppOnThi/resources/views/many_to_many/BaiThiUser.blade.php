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
    
    body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .av{
        text-align: center;
         
    }
    .wrap_form{
        display: flex;
        justify-content: space-between;
        max-width: 300px;
    }
    table, th, td {
    border: 1px solid black;
    }
    .b{
        margin-left: 50px;
    }
</style>
<body class="b">
    
<h2 class="av" >DANH SÁCH CÁC USER & BAI THI</h2>
     
     <a class="fas fa-home" href="/admin/listUser">Quay Lại</a></br></br>
     <fieldset>
         <legend>Danh Sách Các Bai Thi Chưa Thêm</legend>
     @foreach($listBT_chua_pick as $item)
     <label for="">{{$item->TenBT}}</label>
     <input type="checkbox" id="{{$item->id}}" value="{{$item->id}}" name="id_BT">
     
     @endforeach
     
     </fieldset></br> 
     <button onclick="AddBaiThiUser('{{$id}}')">Xác nhận thêm</button>
     <h4>Danh Sách Các Bai Thi Đã Được Thêm</h4>
    <div>
        <table>
            <tr>
                <th>ID </th>
                <th>Tên Bai Thi</th>
                <th>Action</th>
            </tr>
            
            @foreach($listBT as $key=> $item)
            <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->TenBT}}</td>
            <td><button onclick="window.location.href='/admin/DeleteBaiThiUser?idUser={{$id}}&idBT={{$item->id}}'">Xóa Bài Thi</button></td>
            </tr>
        @endforeach
            
        </table>
       
    </div> 
</body>

<script>
    function AddBaiThiUser(idBT){
        arr_pick =$('input[type=checkbox]:checked').map(function(_, el) {
           return $(el).val();
        }).get();
        
        console.log(arr_pick);
        $.ajaxSetup({
        headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            type:"POST",
            url :"/admin/AddBaiThiUser/"+idBT,
            data: {'arr_pick':arr_pick},
            success: function(data){
                location.reload();
            }, error: function(data){
                alert("Add fail");
            }})}
</script>
</html>