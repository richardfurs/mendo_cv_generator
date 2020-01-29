$(document).ready(function () {

    $(function () {
        $('.datepicker').datepicker();
    });


    let edjCounter = 0;

    $('#add-edj').click(function () {
        let edjRow = '';
        edjRow += '<div class="row text-center edj-row" id="edj-row'+edjCounter+'">\n' +
            '                <div class="col-sm">\n' +
            '                    <input placeholder="Iestādes nosaukums" name="edj_name'+edjCounter+'" class="form-control"">\n' +
            '                </div>\n' +
            '                <div class="col-sm">\n' +
            '                    <div class="input-group">\n' +
            '                        <input placeholder="gads no" name="edj_year_from'+edjCounter+'" type="text" class="form-control datepicker-y">\n' +
            '                        <div class="input-group-prepend">\n' +
            '                            <span class="input-group-text" id="">-</span>\n' +
            '                        </div>\n' +
            '                        <input placeholder="gads līdz" name="edj_year_to'+edjCounter+'" type="text" class="form-control datepicker-y">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-sm">\n' +
            '                    <input placeholder="Specialitāte" name="edj_spec'+edjCounter+'" class="form-control">\n' +
            '                </div>\n' +
            '                <input name="edj_counter" type="hidden" value="'+edjCounter+'">\n' +
            '            </div>';

        $('#append-edj').append(edjRow);

        $('#remove-edj').removeClass('hidden');

        let endYear = new Date(new Date().getFullYear(), 11, 31);

        $(".datepicker-y").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            endDate: endYear
        });

        edjCounter++;
    });

    $('#remove-edj').click(function () {
        edjCounter--;
        $('#edj-row' + edjCounter).remove();

        if(edjCounter < 1) {
            $('#remove-edj').addClass('hidden');
        }
    });

});
