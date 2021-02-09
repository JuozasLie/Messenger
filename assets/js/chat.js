// show messages with ajax from database
function show_messages(){
    let msg = true;
    $.ajax({
        type : 'GET',
        url  : 'ajax/show_messages.php',
        data : {'message': msg},
        success : function(feedback){
            $(".message-area").html(feedback);
        }
    })
}
//scroll to the bottom of the chat
function scroll_bottom(){
    $(".message-area").animate({scrollTop: 9999 },1500);
}
//Display online users
function online_users(){
    $.ajax({
        type : "GET",
        url  : "ajax/online_users.php",
        dataType : "JSON",
        success : function(feedback){
            if(feedback['users'] == 1){
                $(".online-users").html("Only you are online"); 
            } else {
                $(".online-users").html(feedback["users"] + " users online");
            }
            
        }
    })
}
//Check user login time and log them out
function user_status(){
    $.ajax({
        type : 'GET',
        url  : 'ajax/user_status.php',
        dataType : 'JSON',
        success : function(feedback){
            if(feedback['status'] == "href"){
                window.location = "login.php";
            }
        }
    })
}
$(document).ready(function(){
    show_messages();
    scroll_bottom();
    online_users();
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
                            show_messages();
                            scroll_bottom();
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
                        show_messages();
                        scroll_bottom();
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
                    show_messages();
                    scroll_bottom();
                }
            }
        })
    })
    //remove messages
    $(".clean-chat").click(function(){
        $.ajax({
            type : 'POST',
            url  : 'ajax/clean.php',
            data : {'clean' : true},
            dataType : 'JSON',
            success : function(feedback){
                if(feedback['status'] == 'clean'){
                    show_messages();
                    scroll_bottom();
                }
            }
        })
    })
    //send ajax requests
    setInterval(() => {
        show_messages();
    }, 3000);
    setInterval(() => {
        online_users();
    }, 1000);
    setInterval(() => {
        user_status();
    }, 300,000);
})
