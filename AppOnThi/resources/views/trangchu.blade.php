<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
   
    <title>Document</title>
</head>
<style>
 ul {
list-style: none;
}
.center{
    text-align: center;
}
body{
    background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
} 
.link{
    color:black;
    text-decoration: none;  
}
a.link:hover{
    color:blue;
    font-size: 20px;
   
}
.b{
    text-align: center;
}
.as{
    text-align: right;
    margin-right: 50px;
    font-size: 20px;
    font-weight: bold;
    color: black; 
}
</style>
<body>
    
    <div class="as">
        <a class="fas fa-sign-out-alt" id="out" onclick="out()" >Log Out</a>
    </div>
    <h1 class="center">CÁC CHỨC NĂNG CỦA QUẢN LÝ</h1>
    <ul class="b" >
      <li class=" fas fa-book"><a class="link" href="/admin/listBaiThi" > QUẢN LÝ BÀI THI</a></li> </br>
        <li class="fas fa-question"><a class="link" href="/admin/listCauHoi" > QUẢN LÝ CÂU HỎI</a></li></br>
        <li class="fas fa-users"><a class="link" href="/admin/listMeoThi" > QUẢN LÝ MẸO THI</a></li></br>
        <li class="fas fa-users"><a class="link" href="/admin/listLoaiMeoThi" > QUẢN LÝ LOẠI MẸO THI</a></li></br>
        <li class="fas fa-sign"><a class="link" href="/admin/listBienBao" > QUẢN LÝ BIỂN BÁO</a></li></br>
        <li class="fas fa-sign"><a class="link" href="/admin/listLoaiBienBao" > QUẢN LÝ LOẠI BIỂN BÁO</a></li></br>
        <li class="fas  fa-align-center"><a class="link" href="/admin/listLoaiLyThuyet" > QUẢN LÝ LOẠI LÝ THUYẾT</a></li></br>
        <li class="fas  fa-users"><a class="link" href="/admin/listUser" > QUẢN LÝ USER</a></li></br>
        
    </ul>
  
</body> 
<script>
    function out(){
        var txt ;
        if(confirm("Bạn có thật sự muốn đăng xuất?")){
           txt = $.ajax({ 
            success: function(data){ 
                location.replace("/admin/dangnhap");
            }, 
        }   
        )   
        } 
        document.getElementByID("out").innerHTML=txt;
    }
</script>
</html>