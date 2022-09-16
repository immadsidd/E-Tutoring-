$(document).ready(function(){
    $("#tutoremail").on("blur", function(){
        var tutoremail=$("#tutoremail").val();
      

        $.ajax({
            url:"tutor/addtutor.php",
            method: "POST",
            data : {
                checkmail: "checkmail",
                tutoremail : tutoremail,
               
            },
            success:function(data){
                if(data !=0){
                    $("#tmsg2").html("<span style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);' > <b>email already exist</b></span>");
                    $("#signup2").attr("disabled", true);
                   
        

                }
                else if(data == 0){
                    $("#tmsg2").html("<span style='color:darkgreen; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6); ' > <b>ready to go</b></span>");
                    $("#signup2").attr("disabled", false);
                }
                
    
               
            },

        });
    });
});



function addtutor(){
    var tutorname = $("#tutorname").val();
    var tutoremail = $("#tutoremail").val();
    var tutorpass = $("#tutorpass").val();

    // checking form feilds empty or not\
    if(tutorname.trim() == ""){
        $("#tmsg1").html("<small  style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Name !</b></small>");
        $("#tutorname").focus();
        return false;
    }
     else if(tutoremail.trim() == ""){
        $("#tmsg2").html("<small  style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Email !</b></small>");
        $("#tutoremail").focus();
        return false;
    }
    else if(tutorpass.trim() == ""){
        $("#tmsg3").html("<small style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Password !</b></small>");
        $("#tutorpass").focus();
        return false;
    } 

    else{
        $.ajax({
            url:"tutor/addtutor.php",
            method: "POST",
            dataType: "json",
            data : {
                tutorsignup :"tutorsignup",
                tutorname : tutorname,
                tutoremail : tutoremail,
                tutorpass : tutorpass,
            },
            success:function(data){
                console.log(data);
    
                if(data == "ok"){
                    $('#successs').html("<span style='color:green;'> Registration Successful !</span>")
                    clear();
                }
    
                else if(data == "failed"){
                    $('#successs').html("<span>Unable to register</span>")
                }
            }
        })
    }
    
}

//empty feilds
function clear(){
    $("#sf3").trigger("reset");
    $("#tmsg1").html(" ");
    $("#tmsg2").html(" ");
    $("#tmsg3").html(" ");
}


// tutor login

function tutorlogin(){
    var tutorlogemail = $("#tutorlogemail").val();
    var tutorlogpass = $("#tutorlogpass").val();
    $.ajax({ 
        url:"tutor/addtutor.php",
        method: "POST",
        data:{
            check: "checking",
            tutorlogemail: tutorlogemail,
            tutorlogpass: tutorlogpass,     
        },
        success:function(data){
            if (data == 0){
                $("#logtmsg").html("<small class='alert alert-danger'>Invalid E-mail id or Password!</small>")
            }
            else if (data == 1){
                $("#logtmsg").html("<div class='spinner-border text-success' role='status'></div>")
                setTimeout(()=>{
                    window.location.href = "tutor/tutorprofile.php";

                }, 1000);
            }   

        },

    });
} 