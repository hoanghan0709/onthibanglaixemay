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
    .wrap_form{
        display: flex;
        justify-content: space-between;
        max-width: 300px;
        margin-left: 50px;
    } 
    .a{
        text-align: center;
    }
    .b{
        margin-left: 50px;
    }
    body{
    background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
} 
</style>
<body>
    <form  action="javascript:void(0)" method="POST" id="myform" enctype="multipart/form-data" onsubmit="addBaiThi()">
        @csrf 
        <h2 class="a">THÊM BÀI THI </h2>
        
        <a class="b fas fa-home" href="/admin/listBaiThi">Quay Lại</a></br></br>
        <div class="wrap_form">
            <label for="">Tên bài thi</label>
        <input type="text" name="tenBT">
        </div> 
        <div class="wrap_form">
            <label for="">Phút</label>
        <input type="text" name="phut">
        </div> 
        <div class="wrap_form">
            <label for="">Giây</label>
        <input type="text" name="giay">
        </div> 
        <div class="wrap_form">
            <label for="">Điểm</label>
        <input type="text" name="ḍiem">
        </div> 
        <div class="wrap_form">
            <label for="">Kết quả</label>
        <input type="text" name="ketqua">
        </div></br>
        <div class="wrap_form">
        <button  type="submit"  id="btnSubmit">Xác Nhận</button>
        </div>
        

    </form>
</body>
<script>
    function addBaiThi(){
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/addBaiThi",
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("Theem thanh cong");
                location.replace('/admin/listBaiThi');
            },
            
        }   
        )

        
    }
</script>
</html>