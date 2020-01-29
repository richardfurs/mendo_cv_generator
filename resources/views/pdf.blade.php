<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <style>
        /*body { font-family: DejaVu Serif, sans-serif; }*/
        body { font-family: DejaVu Sans;}
    </style>
    <title>Document</title>
</head>
<body>
<h1 align="center">CV</h1>
<p>Pamatinformācija</p>
<img src="{{$requestData['imgUrl']}}"/>

<table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
        <th style="border: 1px solid; padding:12px;" width="30%">Surname</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Date of birth</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
    </tr>
    <tr>
        <td style="border: 1px solid; padding:12px;">{{$requestData['name']}}</td>
        <td style="border: 1px solid; padding:12px;">{{$requestData['surname']}}</td>
        <td style="border: 1px solid; padding:12px;">{{$requestData['birth_date']}}</td>
        <td style="border: 1px solid; padding:12px;">{{$requestData['email']}}</td>


        @for($i = 0; $i <= $requestData['edj_counter']; $i++)
            <td style="border: 1px solid; padding:12px;">{{$requestData['edj_name'.$i]}}</td>
            <td style="border: 1px solid; padding:12px;">{{$requestData['edj_year_from'.$i]}}</td>
            <td style="border: 1px solid; padding:12px;">{{$requestData['edj_year_to'.$i]}}</td>
            <td style="border: 1px solid; padding:12px;">{{$requestData['edj_spec'.$i]}}</td>
        @endfor
    </tr>

</table>
</body>
</html>

