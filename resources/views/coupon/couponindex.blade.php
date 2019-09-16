<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{ text-align:center}
        #divcss5{margin:0 auto;
            border:1px solid #000;
            width:780px;
            height:1250px;
            color:#398439;
            background-image: url("/uploads/beijintu.jpg");
        }
        .div{
            float: left;
            height: 1000px;
            width: 780px; border: thick double yellow;
        }
        .div2{
            text-align: center;
            font-style: italic;
            font-size: 24px;
            width: 700px;
        }
        .get{
            background: red;
            border: #1f1f1f;
            float: left;
            height: 50px;
            width: 120px;
            color:#006dcc;
            font-size: 17px;
            font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 50px;
            text-align: center;
            cursor: pointer;
            margin-left: 10px;
            margin-top: 10px;
        }


    </style>
</head>
<body>
<div id="divcss5">
    <div class="div2"><h3>优惠券领取专区</h3></div>
    <div class="div">
        @foreach($data as $d)
            <div class="get" c_id="{{$d['c_id']}}" @if(time() > strtotime($d['last_time'])) style="pointer-events: none;" @else style="pointer-events: true;" @endif minute="{{$d['minute']}}" type="{{$d['type']}}" >@if(time() > strtotime($d['last_time'])) 已过期 @else {{$d['c_name']}}  @endif</div>
        @endforeach
    </div>
</div>
</body>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.get',function(){
        var type=$(this).attr('type');
        var minute=$(this).attr('minute');
        var c_id=$(this).attr('c_id');
        $.ajax({
            url:"/coupon/getcoupon",
            method:'post',
            data:{type:type,minute:minute,c_id:c_id},
            dataType:"json",
            success:function(res){
                if(res.code == 1){
                    alert(res.msg);
                }else if(res.code == 2){
                    alert(res.msg);
                }else if(res.code == 200){
                    alert(res.msg+':'+res.code_id)
                }else if(res.code == 3){
                    alert(res.msg);
                }
            }
        });
    });
</script>
</html>