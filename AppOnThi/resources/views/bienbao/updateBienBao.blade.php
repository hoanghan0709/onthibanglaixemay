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
    .wrap_form{
        display: flex;
        justify-content: space-between;
        max-width: 300px;
    }
    .a{
        text-align: center;
    }
    .b{
        margin-left: 50px;
    }
</style>
<body>
    <form class="b" action="javascript:void(0)" method="POST" id="myform" enctype="multipart/form-data" onsubmit="updateBienBao('{{$bienbao->id}}')">
        @csrf 
        <h2 class="a">SỬA BIỂN BÁO</h2>
        <a class="fas fa-home" href="/admin/listBienBao">Quay Lại</a></br></br>
        <div class="wrap_form">
            <label for="">Tên Biển Báo</label>
        <input type="text" name="tenBB" value="{{$bienbao->TenBB}}">
        </div>
        <div class="wrap_form">
            <label for="">Nội Dung Biển Báo</label>
        <input type="text" name="noidungBB" value="{{$bienbao->NoiDungBB}}">
        </div>
        <div class="wrap_form">
            <label for="">Hình Ảnh Biển Báo</label>
        <input type="text" name="hinhanhBB" value="{{$bienbao->HinhAnhBB}}">
        </div>
        <div class="wrap_form">
            <label for="">Id Loại Biển Báo</label>
        <select name="id_LoaiBB" >
           @foreach($loaibb as $id => $name )  
                @if($bienbao->id_LoaiBB==$id)
                <option  selected value="{{$id}}">{{$name}}</option>   
                @else <option value="{{$id}}">{{$name}}</option> 
                @endif  
           @endforeach
        </select>
        </div>
</br>
        <div class="wrap_form">
            <button id="btnSubmit" type="submit"  >Xác Nhận</button>
        </div>
        

    </form>
</body>
<script>
    function updateBienBao(id){
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/updateBienBao/"+id,
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("update thanh cong");
                location.replace('/admin/listBienBao');
            },error: function(data){
                alert("update that bai");
               // location.replace('/admin/listBienBao');
            }
            
        }   
        )
        
        
    }
</script>
</html>