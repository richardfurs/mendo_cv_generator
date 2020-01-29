<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <style>
        .button-remove {
            padding: 0px 15px 0 14px;
        }
        .hidden {
            display: none;
        }
    </style>
    <title>CV Generator</title>
</head>
<body>
<div class="container">
    <h1>CV Ģenerēšanas Forma</h1>
    <form action="/pdf" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Vārds</label>
            <input name="name" class="form-control" id="name">
            {!! $errors->first('name', '<p class="alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="name">Uzvārds</label>
            <input name="surname" class="form-control" id="surname">
            {!! $errors->first('surname', '<p class="alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="birth-date">Dzimšanas datums</label>
            <input name="birth_date" class="form-control datepicker" id="birth-date" data-date-end-date="0d">
            {!! $errors->first('birth_date', '<p class="alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="email">E-pasts</label>
            <input name="email" class="form-control" id="email">
            {!! $errors->first('email', '<p class="alert-danger">:message</p>') !!}
        </div>

{{--        IZGLĪTĪBAS IESTĀDES--}}
        <h5 class="text-center">Izglītības iestādes</h5>

        <div id="append-edj"></div>

        <input id="add-edj" type="button" class="btn btn-primary btn-block" value="Pievienot Izglītības Iestādi">
        <input id="remove-edj" type="button" class=" hidden btn btn-danger btn-block" value="Noņemt Izglītības Iestādi">


{{--        VALODU ZINĀŠANAS--}}
        <h5 class="text-center">Valodu zināšanas</h5>
        <div class="row text-center">
            <div class="col-sm">
                <strong>Valoda</strong>
            </div>
            <div class="col-sm">
                <strong>Runātprasme</strong>
            </div>
            <div class="col-sm">
                <strong>Lasītprasme</strong>
            </div>
            <div class="col-sm">
                <strong>Rakstītprasme</strong>
            </div>
        </div>

{{--        ANGĻU VALODA--}}
        <div class="row text-center">
            <div class="col-sm">
                Angļu
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
        </div>

{{--        LATVIEŠU VALODA--}}
        <div class="row text-center">
            <div class="col-sm">
                Latviešu
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
        </div>

{{--        KRIEVU VALODA--}}
        <div class="row text-center">
            <div class="col-sm">
                Krievu
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="form-control">
                    <option disabled selected>Izvēlieties līmeni</option>
                    <option>Pamatzināšanas</option>
                    <option>Vidēji</option>
                    <option>Labi</option>
                    <option>Teicami</option>
                    <option>Dzimtā Valoda</option>
                </select>
            </div>
        </div>
        <input id="add-lang" type="button" class="btn btn-light btn-block" value="Pievienot Valodu">

        <div class="custom-file">
            <input name="image" type="file">
            {!! $errors->first('image', '<p class="alert-danger">:message</p>') !!}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

</body>
</html>
