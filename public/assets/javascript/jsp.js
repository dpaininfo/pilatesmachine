$(window).on('load',function(){
    var delayMs = 1500; // delay in milliseconds
    
    setTimeout(function(){
        $('#myModal').modal('show');
    }, delayMs);
});