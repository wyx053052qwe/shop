<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table{
            margin : 10px 0px 15px 30px;
        }
    </style>
</head>
<body>
<div class="table">
    <h3>优惠券</h3>
    <ul class="nav nav nav-pills">
        <li role="presentation" class="active select" name="first"><a href="javascript:;">未使用</a></li>
        <li role="presentation" class="select" name="last"><a href="javascript:;">已过期</a></li>
    </ul>
</div>
<table class="show_first div" border="1">
    <tr>
        <td>优惠券说明</td>
        <td>操作</td>
    </tr>
    @foreach($data as $d)
        <tr>
            @if($d['status'] == 2)
                <td id="{{$d['r_id']}}">{{$d['c_name']}}</td>
                <td><button type="button" class="pay">前往使用</button></td>
            @else
            @endif

        </tr>
    @endforeach
</table>
<table class="show_last bb" border="1">
    <tr>
        <td>优惠券说明</td>
        <td>操作</td>
    </tr>
    @foreach($data as $d)
        <tr>
            @if($d['status'] == 3)
                <td id="{{$d['r_id']}}">{{$d['c_name']}}</td>
                <td><button type="button" class="del">删除</button></td>
            @else
            @endif

        </tr>
    @endforeach
</table>
</body>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script>
    $('.div').show();
    $('.bb').hide();
    $('.select').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var name=$(this).attr('name');
        if(name == 'first'){
            $('.show_'+name).show();
            $('.show_last').hide();
        }else{
            $('.show_'+name).show();
            $('.show_first').hide();
        }


    });
    $('.del').click(function(){
        var id=$(this).parent().siblings().attr('id');
       $.ajax({
           url:'/user/del',
           data:{id:id},
           dataType:'json',
           success:function(res){
                if(res.code==1){
                    alert(res.msg);
                    location.href=res.url;
                }else{
                    alert(res.msg);
                    location.href=res.url;
                }
           }
       });
    })
    $('.pay').click(function(){
        var id=$(this).parent().siblings().attr('id');
        $.ajax({
            url:'/user/pay',
            data:{id:id},
            dataType:'json',
            success:function(res){

            }
        });
    });

</script>
</html>