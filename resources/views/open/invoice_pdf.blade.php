<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>PDF</title>
<style>
@font-face{
    font-family: ipag;
    font-style: normal;
    font-weight: normal;
    src:url('{{ storage_path('fonts/ipag.ttf')}}');
}
body {
    font-family: ipag;
}
p.h1{
    font-size:2.0em;
    text-align:center;
}
p.date{text-align:right;}
p.memo{margin:0;padding:0;}
p.h2{font-size:1.2em;}
p.fee{
    font-size:2.5em;
    text-align:center;
    margin-top:10%;
    width:100%;
    background-color:#ccc;
}
span.bill{
    font-size:0.5em;
}
p.address{
    text-align:right;
}
p.tel{
    text-align:right;
    margin-top:20px;
}
img.hanko{
    width:100px;
    position:absolute;
    top:250;
    right:0;
    z-index:-1;
}
table{
    width:100%;
    border:1px solid #000;
    border-collapse: collapse;
    border-spacing: 0;
}
table td.th{
    padding:3px;
    text-align:center;
    border:1px solid #000;
}

table td.th.w70{
    width:70%;
}
table td.blue{
    background-color:#f0f8ff;
}
</style>
</head>
<body>
    @if($file)
    <img src="{{$file}}" class="hanko" />
    @endif
    <p class="date">{{$date}}</p>
    <p class="h1">{{$title}}</p>
    <p class="h2">{{$name}}{{$honor}}</p>
    <p class="fee"><span class='bill'>{{$bill}}</span> {{$fee}}</p>
    <p class="memo">{{$memo}}</p>
    <p class="h2">{{$recipe_message}}</p>
    <p class="address">{!! nl2br(e($address)) !!}</p>
    <p class="tel">{{$tel}}</p>
    <table>
        <tr>
            <td class="th blue">No</td>
            <td class="th w70 blue">&nbsp;</td>
            <td class="th blue">&nbsp;</td>
        </tr>
        <tr>
            <td class="th">1</td>
            <td class="th w70">{{$join_titles}}</td>
            <td class="th">&yen;{{$join_price}}</td>
        </tr>
        <tr>
            <td class="th">2</td>
            <td class="th w70">{{$party_titles}}</td>
            <td class="th">&yen;{{$party_price}}</td>
        </tr>
    </table>
</body>
</html>
