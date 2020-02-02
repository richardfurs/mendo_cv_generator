<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>CV Generator</title>
</head>
<body>
<div class="container">
    <h1>CV Ģenerēšanas Forma</h1>
    <form id="form" method="post" id="form" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Vārds</label>
            <input name="name" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Uzvārds</label>
            <input name="surname" class="form-control" id="surname" value="{{ old('surname') }}">
        </div>
        <div class="form-group">
            <label for="birth-date">Dzimšanas datums</label>
            <input name="birth_date" class="form-control datepicker" id="birth-date" value="{{ old('birth_date') }}" data-date-end-date="0d">
        </div>
        <div class="form-group">
            <label for="email">E-pasts</label>
            <input name="email" class="form-control" id="email" value="{{ old('name') }}">
        </div>

{{--        IZGLĪTĪBAS IESTĀDES--}}
        <h5 class="text-center">Izglītības iestādes</h5>

        <div id="append-edj">
            <div class="row text-center edj-row" id="edj-row">
                <div class="col-sm">
                    <input type="text" placeholder="Iestādes nosaukums" name="edj_name[]" class="form-control edj-name">
                </div>
                <div class="col-sm">
                    <div class="input-group">
                        <input placeholder="gads no" name="edj_year_from[]" type="text" class="form-control edj-y-from datepicker-y">
                        <div class="input-group-prepend">
                            <span class="input-group-text">-</span>
                        </div>
                        <input placeholder="gads līdz" name="edj_year_to[]" type="text" class="form-control edj-y-to datepicker-y">
                    </div>
                </div>
                <div class="col-sm">
                    <input placeholder="Specialitāte" type="text" name="edj_spec[]" class="edj-spec form-control">
                </div>
             </div>
        </div>
        <div id="edj-error" class="alert-danger"></div>

        <input id="add-edj" type="button" class="btn btn-light btn-block" value="Pievienot Izglītības Iestādi">
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

        <div id="lang-append">
            {{--        ANGĻU VALODA--}}
            <div id="lang-row-clone" class="row text-center lang-row">
                <div class="col-sm">
                    Angļu
                    <input name="lang_name[]" type="hidden" value="Angļu" class="lang-name">
                </div>
                <div class="col-sm">
                    <select name="lang_speech[]" class="form-control lang-speech">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_read[]" class="form-control lang-read">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_write[]" class="form-control lang-write">
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
            <div class="row text-center lang-row">
                <div class="col-sm">
                    Latviešu
                    <input name="lang_name[]" type="hidden" value="Latviešu" class="lang-name">
                </div>
                <div class="col-sm">
                    <select name="lang_speech[]" class="form-control lang-speech">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_read[]" class="form-control lang-read">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_write[]" class="form-control lang-write">
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
            <div class="row text-center lang-row">
                <div class="col-sm">
                    Krievu
                    <input name="lang_name[]" type="hidden" value="Krievu" class="lang-name">
                </div>
                <div class="col-sm">
                    <select name="lang_speech[]" class="form-control lang-speech">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_read[]" class="form-control lang-read">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="lang_write[]" class="form-control lang-write">
                        <option disabled selected>Izvēlieties līmeni</option>
                        <option>Pamatzināšanas</option>
                        <option>Vidēji</option>
                        <option>Labi</option>
                        <option>Teicami</option>
                        <option>Dzimtā Valoda</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="lang-error" class="alert-danger"></div>

        <input id="add-lang" type="button" class="btn btn-light btn-block" value="Pievienot Valodu">

        <input id="remove-lang" type="button" class="hidden btn btn-danger btn-block" value="Noņemt Valodu">

        <div class="custom-file">
            <h5>Pievienot attēlu</h5>
            <input name="image" type="file" class="image-input">
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="submit">Iesniegt</button>
    </form>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

</body>
</html>
