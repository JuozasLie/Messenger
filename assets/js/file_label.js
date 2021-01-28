$(document).ready(function(){
    $(document).on("change", "#file", function(){
        let image_name = $("#file").val();
        $("#file-label").html(image_name);
    })
})