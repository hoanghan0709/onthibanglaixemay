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
    <form class="b" action="javascript:void(0)" method="POST" id="myform" enctype="multipart/form-data" onsubmit="addCauHoi()">
        @csrf 
        <h2 class="a">THÊM CÂU HỎI</h2>
        <a class="fas fa-home" href="/admin/listCauHoi">Quay Lại</a></br></br>
        <div class="wrap_form">
            <label for="">Tên Câu Hỏi</label>
        <input type="text" name="tenCH">
        </div>
        <div class="wrap_form">
            <label for="">Nội Dung Câu Hỏi</label>
        <input type="text" name="noidungCH">
        </div>
        <div class="wrap_form">
            <label for="">Hình Ảnh</label>
        <input type="text" name="hinhanh">
        </div>
        <div class="wrap_form">
            <label for="">Đáp Án Đúng</label>
        <input type="text" name="dapandung">
        </div>
        <div class="wrap_form">
            <label for="">Đáp Án A</label>
        <input type="text" name="dapanA">
        </div>
        <div class="wrap_form">
            <label for="">Đáp Án B</label>
        <input type="text" name="dapanB">
        </div>
        <div class="wrap_form">
            <label for="">Đáp Án C</label>
        <input type="text" name="dapanC">
        </div>
        <div class="wrap_form">
            <label for="">Đáp Án D</label>
        <input type="text" name="dapanD">
        </div>
        <div class="wrap_form">
            <label for="">Giải Thích</label>
        <input type="text" name="giaithich">
        </div>
        <div class="wrap_form">
            <label for="">Loại Lý Thuyết</label>
        <select name="id_LLT">
           @foreach($list as $id => $name )
            <option value="{{$id}}">{{$name}}</option>
           @endforeach
        </select>
        </div>
</br>
        <div class="wrap_form">
            <button id="btnSubmit" type="submit" > Xác Nhận </button>
        </div>
        

    </form>
   
</body>
<script>
    function addCauHoi(){
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/addCauHoi",
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("theem thanh cong");
                location.replace('/admin/listCauHoi');
            },
            
        }   
        )
        
    }
</script>
</html>