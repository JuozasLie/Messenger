$(document).ready(function(){
    $(document).on("change", "#file", function(){
        let image_path = $("#file").val();
        let file_name = image_path.split("\\").pop();
        $("#file-label").html(file_name);
    })
})