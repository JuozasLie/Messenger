$(document).ready(function(){
    $(document).on("change", "#new_image", function(){
        let image_path = $("#new_image").val();
        let file_name = image_path.split("\\").pop();
        $("#change-image-label").html(file_name);
    })
})