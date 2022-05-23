<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <title>Document</title>
</head>
<style>
   body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .a{
        text-align: center;
        margin-top: 150px;
        font-style: bold;
        font-size: 40px;
    }
    .b{
        text-align: center;
        margin-right: 80px;
        padding-top: 10px;
    }
    .b2{
        text-align: center;
        margin-right: 20px; 
        font-size: 16px;  
        margin-top: 5px; 
        border-radius: 20px;
        
    }
    .b2:hover{
        color: red;
    }
    .c{
        margin-top: 5px;
        text-align: center;
        margin-left:50px;  
        text-decoration: none;
    }
    .red-alert {
        color: black;
        text-align: center;
    }
     
     
     
    
</style>
<body>
        <form action="{{route('admin.dangnhap')}}" method="POST" id="myform" >
        
        {{csrf_field()}}
        <h2 class="a">ĐĂNG NHẬP</h2> 
        <div class="b">
            <label  for="">Tài khoản</label>
            <input  placeholder="Nhập tài khoản" type="text" name="taikhoan">
        </div>
        <div class="b">
            <label for="">Mật Khẩu</label>
            <input placeholder="Nhập mật khẩu"  type="password" name="matkhau">
        </div>
</br>
        @if(Session::get('alter_error') != null)
        <div class="red-alert">
            {{Session::get('alter_error')}}
        </div>  
        @endif
        <div class="b2">
            <button class="b2" type="submit" id="btnSubmit"> Đăng nhập</button>
        </div>
        
        
        </form>
</body> 
</html>