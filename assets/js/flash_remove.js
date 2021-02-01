$(document).ready(function(){
    $(".remove-flash").click(function(){
        $(".flash-message").hide();
    })
    setTimeout(function(){
        $(".flash-message").fadeOut("slow");
    }, 3000);
})