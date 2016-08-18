$(document).ready(function () {
   
    $('.book-apm').click(function () {

        console.log(this);

        var href = $(this).attr('href');

        $('#myModal').load(href, function(){
            $('#myModal').modal('show');
        });


        return false;
    })
    
    
    
});
