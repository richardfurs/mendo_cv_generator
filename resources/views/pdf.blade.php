<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('css/pdf.css')}}">

    <title>Document</title>
</head>
<body>

    <div class="header">
        <img class="logo" src="{{asset('logo/cv_logo.png')}}">
        <h1 align="center">CV</h1>
    </div>


    <h4>Pamatinformācija</h4>

    <div class="info-parent">
        <div class="info-alias">
            <p>Vārds, uzvārds:</p>
            <p>Dzimšanas datums:</p>
            <p>E-pasta adrese:</p>
        </div>
        <div class="info-data">
            <img class="profile-img" src="{{$requestData['imgUrl']}}"/>
            <p><strong>{{$requestData['name']}} {{$requestData['surname']}}</strong></p>
            <p>{{$requestData['birth_date']}}</p>
            <p><a><span>{{$requestData['email']}}</span></a></p>
        </div>
    </div>

    <h4>Iemaņas un zināšanas</h4>

    <h5><b>Valodu zināšanas</b></h5>
    <table>
        <tr>
            <th></th>
            <th>Valoda</th>
            <th>Runātprasme</th>
            <th>Lasītprasme</th>
            <th>Rakstītprasme</th>
        </tr>
        @foreach($requestData['lang_name'] as $i => $name)
            <tr>
                <td>{{$i + 1}}.</td>
                <td>{{$name}}</td>
                <td>{{$requestData['lang_speech'][$i]}}</td>
                <td>{{$requestData['lang_read'][$i]}}</td>
                <td>{{$requestData['lang_write'][$i]}}</td>
            </tr>
        @endforeach
    </table>

    <h4>Izglītība</h4>
    @foreach($requestData['edj_name'] as $i => $name)
        <div class="edu-parent">
            <div class="edu-alias">
                <p>Izglītības iestādes nosaukums:</p>
                <p>Gads no:</p>
                <p>Gads līdz:</p>
                <p>Specialitāte:</p>
            </div>
            <div class="edu-data">
                <p><strong>{{$name}}</strong></p>
                <p>{{$requestData['edj_year_from'][$i]}}</p>
                <p>{{$requestData['edj_year_to'][$i]}}</p>
                <p>{{$requestData['edj_spec'][$i]}}</p>
            </div>
        </div>
    @endforeach

</body>
</html>

