$( document ).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:true,
        mouseDrag:false,
        autoplay:true,
        animateOut: 'slideOutUp',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('#register_email').on('blur',function(){
        $that = $(this);
        var email = $(this).val();
        var data = {'email':email};
        $.ajax({
            url: "assets/checkEmail.php",
            method: "GET",
            dataType: 'json',
            data: data,
            success: function(response) {
                if(response.error){
                    $that.css("border","1px solid #ff0000");
                    $("#email_status").html(response.message);
                    $("#email_status").css({"display": "block", "color": "#ff0000"});
                    $("#register").css("cursor", "not-allowed")
                    $("#register").prop("disabled",true);
                }else{
                    $that.css("border","1px solid #00FF00");
                    $("#email_status").html(response.message);
                    $("#email_status").css({"display": "block", "color": "#65ff00"});
                     $("#register").css("cursor", "pointer")
                    $("#register").prop("disabled",false);
                }
            }
        });
    });


    $(document).on('click', '#send', function(e){
            e.preventDefault();
            $that = $(this);
            var id = $that.data("postId"); 
            var content = $("#content_" + id).val();

            $.ajax({
                url: "assets/sendMessage.php",
                method: "POST",
                data: {id:id, content:content},
                
                success:function(dataa){
                    var li = $("<li></li>").addClass("okey");
                    $("#append_ul_" + id).append(li);
                    $(li).append(content);
                    $("#content_" + id).val('');
                }
            });
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        $that = $(this);
        var id = $that.data("postId");
        if(confirm("Are You sure?")) {
            $.ajax({
                url: "assets/deletePost.php?post_id=" + id,
                method: "GET",
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $that.parent().parent().fadeOut();
                    }
                }
            });
        }
    });


    $(document).on("click",".edit",function(e){
        e.preventDefault();
        $thatt = $(this);
        var id = $thatt.data("postId");
        var title = $thatt.parent().parent().find('.title').val();
        var content = $thatt.parent().parent().find('.content').text();

        $("#title").val(title);
        $("#content").val(content);
        $("#postId").val(id);
    });

    $(document).on('click', '.save', function(e){
        e.preventDefault();
        $that = $(this);
        var id = $("#postId").val();
        var title = $("#title").val();
        var content = $("#content").val();
        var data={
            newtitle: title,
            newcontent: content,
            update: true,
            id: id
        };
            $.ajax({
                url: "assets/editPost.php",
                method: "POST",
                dataType: 'json',
                data: data,
                success: function (dataa) {
                    if (dataa.success) {
                        $(".close").trigger('click');
                        $('#tit').html(data.newtitle);
                         $('#cont').html(data.newcontent);
    
                    }
                }
            });
    });

});