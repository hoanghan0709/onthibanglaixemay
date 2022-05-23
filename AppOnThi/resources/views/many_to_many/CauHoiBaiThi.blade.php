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
    .c{
        margin-left: 50px;
    }
</style>
<body class="c">
    <h2 class="av" >DANH SÁCH CÁC CÂU HỎI VÀ BÀI THI</h2>
     
        <a class="fas fa-home" href="/admin/listBaiThi">Quay Lại</a></br></br>
        <fieldset>
            <legend>Danh Sách Các Câu Hỏi Chưa Thêm</legend>
        @foreach($list_chua_pick as $item)
        <label for="">{{$item->TenCH}}</label>
        <input type="checkbox" id="{{$item->id}}" value="{{$item->id}}" name="id_CH">
        
        @endforeach
        
        </fieldset></br> 
        <button onclick="addCauHoiBT('{{$id}}')">Xác nhận thêm</button>
        
    </div>

    <!-- list cau hoi da chon -->
    <h4>Danh Sách Các Câu Hỏi Đã Được Thêm</h4>
    <div>
        <table>
            <tr>
                <th>ID </th>
                <th>Tên Câu Hỏi</th>
                <th>Action</th>
            </tr>
            
            @foreach($listCH as $key=> $item)
            <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->TenCH}}</td>
            <td><button onclick="window.location.href='/admin/DeleteCauHoiBaiThi?idBT={{$id}}&idCH={{$item->id}}'">Xóa câu hỏi</button></td>
            </tr>
        @endforeach
            
        </table>
       
    </div> 
</body>
<script>
    function addCauHoiBT(idBT){
        arr_pick =$('input[type=checkbox]:checked').map(function(_, el) {
           return $(el).val();
        }).get();
        
        console.log(arr_pick);
        $.ajaxSetup({
        headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            type:"POST",
            url :"/admin/AddCauHoiBaiThi/"+idBT,
            data: {'arr_pick':arr_pick},
            success: function(data){
                location.reload();
            }, error: function(data){
                alert("Add fail");
            }})}
</script>
</html>