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
        .wrap_form{
            display: flex;
            justify-content: space-between;
             max-width: 300px;
            }
            .b{
                margin-left: 50px;
            }
    </style>
<body>
  <form class="b" action="javascript:void(0)" method="POST" id="myform" enctype="multipart/form-data" onsubmit="updateLoaiLyThuyet('{{$loailt->id}}')">
  @csrf   
  <h2 class="a">SỬA LOẠI LÝ THUYẾT</h2> 
<a class="fas fa-home" href="/admin/listLoaiLyThuyet">Quay Lại</a></br></br>
  <div class="wrap_form">
      <label for="">Tên Loại Lý Thuyết</label>  
       <input type="text" name="tenloaiLT" value="{{$loailt->TenLoaiLT}}">
    </div>
    <div class="wrap_form">
      <label for="">Icon</label>  
       <input type="text" name="icon" value="{{$loailt->Icon}}">
    </div></br>
    <div class="wrap_form">
        <button  type="submit"  id="btnSubmit">Xác Nhận</button>
    </div>


</form>

</body>
<script>
    function updateLoaiLyThuyet(id){
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/updateLoaiLyThuyet/"+id,
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("update thanh cong");
                location.replace('/admin/listLoaiLyThuyet');
            },
            
        }   
        )
         
    }
</script>
</html>