$(document).ready(function () {

    $(function () {
        $('.datepicker').datepicker();
    });

    let endYear = new Date(new Date().getFullYear(), 11, 31);

    $(".datepicker-y").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        endDate: endYear
    });


    // ADD EDUCATION ROW
    $('#add-edj').click(function () {

        $('#edj-row').clone().appendTo($('#append-edj')).find('input[type="text"]').val('');

        $('#remove-edj').removeClass('hidden');

        let endYear = new Date(new Date().getFullYear(), 11, 31);

        $(".datepicker-y").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            endDate: endYear
        });

    });

    // REMOVE EDUCATION ROW
    $('#remove-edj').click(function () {
        let edjRowArray = $('.edj-row');
        let lastEdjRowElem = edjRowArray[edjRowArray.length - 1];

        lastEdjRowElem.remove();

        if(edjRowArray.length - 1 < 2) {
            $('#remove-edj').addClass('hidden');
        }
    });

    // ADD LANGUAGE ROW
    $('#add-lang').click(function () {
        let langRow = $('#lang-row-clone').clone()
        langRow.children(':first').html(
            '<input type="text" placeholder="Norādiet valodu" name="lang_name[]" class="form-control lang-name">'
        )
        langRow.appendTo($('#lang-append'))
        $('#remove-lang').removeClass('hidden');
    })

    // REMOVE LANGUAGE ROW
    $('#remove-lang').click(function () {
        let langRowArray = $('.lang-row')
        let lastLangRowElem = langRowArray[langRowArray.length - 1]

        lastLangRowElem.remove()

        if(langRowArray.length - 1 < 4) {
            $('#remove-lang').addClass('hidden');
        }
    })

    // VALIDATE SIMPLE INPUTS
    // $('#form').validate({
    //     rules: {
    //         name: 'required',
    //         surname: 'required',
    //         birth_date: 'required',
    //         email: {
    //             required: true,
    //             email: true
    //         }
    //     },
    //     messages: {
    //         name: {
    //             required: '<p class="alert-danger">Lūdzu ievadiet vārdu!</p>'
    //         },
    //         surname: {
    //             required: '<p class="alert-danger">Lūdzu ievadiet uzvārdu!</p>'
    //         },
    //         birth_date: {
    //             required: '<p class="alert-danger">Lūdzu ievadiet dzimšanas datumu!</p>'
    //         },
    //         email: {
    //             required: '<p class="alert-danger">Lūdzu ievadiet e-pastu!</p>',
    //             email: '<p class="alert-danger">Lūdzu ievadiet derīgu e-pasta adresi!</p>'
    //         }
    //     }
    // })

    $('#form').submit(function (e) {
        e.preventDefault()

        // // VALIDATE EDUCATION INFO
        // let edjInputArr = [
        //     $('.edj-name'), $('.edj-y-from'), $('.edj-y-to'), $('.edj-spec')
        // ]
        //
        // let returnFunc = false
        //
        // let edjErrMsg = $('<p id="edj-err-msg">Lūdzu ievadiet visus izglītības datus!</p>')
        //
        // let showEdjError = function() {
        //     $('#edj-err-msg').remove()
        //     edjErrMsg.appendTo('#edj-error')
        //     returnFunc = true;
        // }
        //
        // $.each(edjInputArr, function () {
        //     $(this).each(function () {
        //         if($(this).val() === '') {
        //             showEdjError()
        //         }
        //     })
        // })
        //
        // // VALIDATE LANGUAGE INFO
        // let langInputArr = [
        //     $('.lang-name'), $('.lang-speech'), $('.lang-read'), $('.lang-write')
        // ]
        //
        // let langErrMsg = $('<p id="lang-err-msg">Lūdzu aizpildiet visus valodu datus!</p>')
        //
        // let showLangError = function() {
        //     $('#lang-err-msg').remove()
        //     langErrMsg.appendTo('#lang-error')
        //     returnFunc = true;
        // }
        //
        // $.each(langInputArr, function () {
        //     $(this).each(function () {
        //         if($(this).val() === null || $(this).val() === '') {
        //             showLangError()
        //         }
        //     })
        // })
        //
        //
        // if(returnFunc)return;

        let formData = new FormData(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/pdf',
            type: 'POST',
            data: formData,
            success:function(data){
                window.location.href = data.success.pdfUrl
            },
            cache: false,
            contentType: false,
            processData: false
        })

    })

});
