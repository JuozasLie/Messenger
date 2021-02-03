$(document).ready(function(){
    $(".chat-form").keypress(function(event){
        if(event.keyCode == 13){
            let send_message = $("#send_message").val();
            if(send_message.length != ""){
                $.ajax({
                    type: "POST",
                    url: "ajax/send_message.php",
                    data: {message:send_message},
                    dataType: "JSON",
                    success: function(feedback){
                        if(feedback.status == "success"){
                            alert("message is sent");
                            $(".chat-form").trigger("reset");
                        }
                    }
                })
            }
        }
    })
// images and files
    $("#upload-files").change(function(){
        let file_name = $("#upload-files").val();
        if(file_name.length != ""){
            $.ajax({
                type : 'POST',
                url  : 'ajax/send_files.php',
                data : new FormData($(".chat-form")[0]),
                contentType : false,
                processData : false,
                success : function(feedback){
                    if(feedback == "error"){
                        $('.files-error').addClass("show-file-error");
                        $('.files-error').html("<span class='files-cross-icon'>&#x2715</span>" + "Please choose a valid file/image");
                        setTimeout(function(){
                            $('.files-error').removeClass("show-file-error");
                        }, 5000)
                    } else if(feedback == "success"){
                        alert("file uploaded successfully");
                    }
                }
            })
        }
    })
//Emoji
    $(".emoji-icon").click(function(){
        let emoji = $(this).attr("src");
        $.ajax({
            type: 'POST',
            url : 'ajax/send_emoji.php',
            data: {'send_emoji': emoji},
            dataType: 'JSON',
            success: function(feedback){
                if(feedback.status == "success"){
                    alert("emoji sent");
                }
            }
        })
    })
})