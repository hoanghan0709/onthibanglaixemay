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
    }
    .a{
        text-align: center;
    }
    body{
        background-image: url("https://images.pexels.com/photos/7054528/pexels-photo-7054528.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

    }
    .b{
        margin-left: 50px;
    }
</style>
<body>
    <form class="b" action="javascript:void(0)" method="POST" id="myform" enctype="multipart/form-data" onsubmit="updateCauHoi('{{$cauhoi->id}}')">
        @csrf 
        <h2 class="a">SỬA CÂU HỎI</h2>
        <a class="fas fa-home" href="/admin/listCauHoi">Quay Lại</a></br></br>
        <div class="wrap_form">
            <label for="">Ten câu hỏi</label>
        <input type="text" name="tenCH" value="{{$cauhoi->TenCH}}">
        </div>
        <div class="wrap_form">
            <label for="">Nội Dung CH</label>
        <input type="text" name="noidungCH" value="{{$cauhoi->NoiDungCH}}">
        </div>
        <div class="wrap_form">
            <label for="">Hình Ảnh</label>
        <input type="text" name="hinhanh" value="{{$cauhoi->HinhAnh}}">
        </div>
        <div class="wrap_form">
            <label for="">Đáp án đúng</label>
        <input type="text" name="dapanDung" value="{{$cauhoi->DapAnDung}}">
        </div>
        <div class="wrap_form">
            <label for="">Đáp án A</label>
        <input type="text" name="dapanA" value="{{$cauhoi->DapAnA}}">
        </div>
        <div class="wrap_form">
            <label for="">Đáp án B</label>
        <input type="text" name="dapanB" value="{{$cauhoi->DapAnB}}">
        </div>
        <div class="wrap_form">
            <label for="">Đáp án C</label>
        <input type="text" name="dapanC" value="{{$cauhoi->DapAnC}}">
        </div>
        <div class="wrap_form">
            <label for="">Đáp án D</label>
        <input type="text" name="dapanD" value="{{$cauhoi->DapAnD}}">
        </div>
        <div class="wrap_form">
            <label for="">Giải Thích</label>
        <input type="text" name="giaithich" value="{{$cauhoi->GiaiThich}}">
        </div>
        <div class="wrap_form">
            <label for="">Id Loại Ly Thuyet</label>
        <select name="id_LLT" >
           @foreach($loailt as $id => $name )  
                @if($cauhoi->id_LLT==$id)
                <option  selected value="{{$id}}">{{$name}}</option>   
                @else
                 <option value="{{$id}}">{{$name}}</option> 
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
    function updateCauHoi(id){
        var myform = new FormData($('#myform')[0]);
        console.log(myform);
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type:"POST",
            url :"/admin/updateCauHoi/"+id,
            data:myform,
            processData:false,
            cache:false,
            contentType:false,
            success: function(data){
                alert("update thanh cong");
                location.replace('/admin/listCauHoi');
            },error: function(data){
                alert("update fail");
                
            }
            
        }   
        )
        
        
    }
</script>
</html>