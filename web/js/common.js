$(document).ready(function () {
   
    $('.book-apm').click(function () {

        console.log(this);

        var href = $(this).attr('href');
        var lang = $(this).data('lang')

        $('#myModal').load(href, function(){
            $.datepicker.setDefaults($.datepicker.regional[lang]);
            $('#visit-date').datepicker({ minDate: +1, maxDate: "+1M" });

            $('#send').click(function(){
                console.log(this);

                //return false;
            });


            $('#myModal').modal('show');
        });


        return false;
    })

});


function makeOrder() {

    ///

}



