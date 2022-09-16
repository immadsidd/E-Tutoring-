$(document).ready(function(){
    $(function(){
        $("#playlist button").on("click",function(){
            $("#videoarea").attr({
                src:$(this).attr("movieurl"),
            });       
        });
    });

     
        
});



