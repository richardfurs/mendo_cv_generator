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

    $('#remove-edj').click(function () {
        let edjRowArray = $('.edj-row');
        let lastEdjRowElem = edjRowArray[edjRowArray.length - 1];

        lastEdjRowElem.remove();

        if(edjRowArray.length - 1 < 2) {
            $('#remove-edj').addClass('hidden');
        }
    });

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

        // let edjInputArr = [
        //     $('.edj-name'), $('.edj-y-from'), $('.edj-y-to'), $('.edj-spec')
        // ]
        //
        // let returnFunc = false
        //
        // let edjErrMsg = $('<p id="edj-err-msg">Lūdzu ievadiet visus izglītības datus!</p>')
        // let langErrMsg = $('<p id="edj-err-msg">Lūdzu aizpildiet visus valodu datus!</p>')
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
