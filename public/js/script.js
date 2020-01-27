$(document).ready(function () {

    $(function () {
        $('.datepicker').datepicker();
    });


    let counter = 0;

    $('#add-edj').click(function () {
        let edjRow = '';
        edjRow += '<div class="row text-center edj-row" id="edj-row'+counter+'">\n' +
            '                <div class="col-sm">\n' +
            '                    <input placeholder="Iestādes nosaukums" name="edj_name'+counter+'" class="form-control"">\n' +
            '                </div>\n' +
            '                <div class="col-sm">\n' +
            '                    <div class="input-group">\n' +
            '                        <input placeholder="gads no" name="edj_year_from'+counter+'" type="text" class="form-control datepicker-y">\n' +
            '                        <div class="input-group-prepend">\n' +
            '                            <span class="input-group-text" id="">-</span>\n' +
            '                        </div>\n' +
            '                        <input placeholder="gads līdz" name="edj_year_to'+counter+'" type="text" class="form-control datepicker-y">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-sm">\n' +
            '                    <input placeholder="Specialitāte" name="edj_spec'+counter+'" class="form-control">\n' +
            '                </div>\n' +
            // '                <input id="remove-edj" type="button" class="btn btn-danger btn-block" value="Noņemt Izglītības Iestādi">\n' +
            // '                <div class="col-sm-1 d-flex" style="flex-direction: row-reverse;">\n' +
            // '                   <input type="button" class="button-remove btn btn-md btn-danger edj-delete" id="edj-del'+counter+'" value="-">\n' +
            // '                </div>\n' +
            '                <input name="counter" type="hidden" value="'+counter+'">\n' +
            '            </div>';

        $('#append-edj').append(edjRow);

        let endYear = new Date(new Date().getFullYear(), 11, 31);

        $(".datepicker-y").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            endDate: endYear
        });

        counter++;
    });

    $('#remove-edj').click(function () {
        counter--;
        $('#edj-row' + counter).remove();
    });

    // $("#append-edj").on("click", "#remove-edj", function () {
    //     $('#edj-row' + counter).remove();
    //
    //     counter--;
    // });

    // $("#append-edj").on("click", ".edj-delete", function () {
    //     let a = this.id;
    //     $('#' + a).parent().parent().remove();
    //
    //     counter--;
    // });

});
