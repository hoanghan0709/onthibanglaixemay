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
    .form{
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
        <form class="b" action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="myform" onsubmit="addLoaiMeoThi()">
        @csrf
        <h2 class="a">THÊM LOẠI MẸO THI</h2>
        <a class="fas fa-home" href="/admin/listLoaiMeoThi">Quay Lại</a></br></br>
        <div class="form">
            <label for="">Tên loại mẹo thi</label>
             <input type="text" name="tenloaiMT">
        </div>
</br>
        <div class="form">
           <button type="submit" id="btnSubmit">Xác nhận</button>
        </div>
        </form>
</body>
<script>
        function addLoaiMeoThi(){
            
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/addLoaiMeoThi",
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("Theem thanh cong");
                location.replace('/admin/listLoaiMeoThi');
            },
            
        }   
        )
        }
</script>
</html>