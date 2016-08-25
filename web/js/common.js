$(document).ready(function () {

    var lang = $('html').attr('lang');

    $.datepicker.setDefaults($.datepicker.regional[lang]);
    $('#visit-date').datepicker({ minDate: +1, maxDate: "+1M" });

    $('.book-apm').click(function () {

        console.log(this);

        var href = $(this).attr('href');
        var lang = $(this).data('lang')

        $('#myModal').load(href, function(){
            $.datepicker.setDefaults($.datepicker.regional[lang]);
            $('#visit-date').datepicker({ minDate: +1, maxDate: "+1M" });

            $('#myModal').modal('show');
        });


        return false;
    })



    $('#myModal').on('click','#send', function(){

        var spinner = createSpinner();
        $('.modal-dialog').append(spinner);

        makeOrder();

        return false;
    });



    $('#form-holder').on('click', '#big-form', function () {

        var spinner = createSpinner();
        $("#form-holder").append(spinner);
        console.log(this);

        makePageOrder();

        return false;
    })



});



function makePageOrder()
{
    var $form = $("#order-form");
    var action = $form.attr('action');
    var formData = $form.serializeArray();
    console.log(formData);

    $('#form-holder').load(action, formData, function(data){
        $('#visit-date').datepicker({ minDate: +1, maxDate: "+1M" });
        console.log(data);
        fadeSpinner();
    });
}


function makeOrder() {

    var $form = $("#order-form");
    var action = $form.attr('action');
    var formData = $form.serializeArray();
    console.log(formData);

    $('#myModal').load(action,formData, function(){
        $('#visit-date').datepicker({ minDate: +1, maxDate: "+1M" });

        fadeSpinner();

    })

    return false;

}


function createSpinner(){

    var spinnerHolder = $("<div/>").attr('id','spinner-holder');
    var spinsHolder = $("<div/>").attr('id','circularG');

    for(i=1;i < 9; i++){

        var el = $("<div/>").attr('id', ("circularG_" + i)).addClass("circularG");
        spinsHolder.append(el);
    }
    var td = $("<td/>").append(spinsHolder);
    var tr = $("<tr>").append(td);
    var table = $("<table/>").append(tr);

    spinnerHolder.append(table);
    console.log(spinnerHolder)
    return spinnerHolder;
}//createspinner


function fadeSpinner()
{
    $("#spinner-holder").fadeIn('slow',function(){
        $(this).remove();
    });
}

