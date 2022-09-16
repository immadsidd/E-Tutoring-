$(document).ready(function(){
    $("#stuemail").on("blur", function(){
        var stuemail=$("#stuemail").val();
      

        $.ajax({
            url:"student/addstudent.php",
            method: "POST",
            data : {
                checkmail: "checkmail",
                stuemail : stuemail,
               
            },
            success:function(data){
                if(data !=0){
                    $("#msg2").html("<span style='color:red; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);' > <b>email already exist</b></span>");
                    $("#signup1").attr("disabled", true);
                   
        

                }
                else if(data == 0){
                    $("#msg2").html("<span style='color:darkgreen; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6); ' > <b>ready to go</b></span>");
                    $("#signup1").attr("disabled", false);
                }
                
                 
                  
            },

        });
    });
});

function addStu(){
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // checking form feilds empty or not\
    if(stuname.trim() == ""){
        $("#msg1").html("<small  style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Name !</b></small>");
        $("#stuname").focus();
        return false;
    }
     else if(stuemail.trim() == ""){
        $("#msg2").html("<small  style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Email !</b></small>");
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim() == ""){
        $("#msg3").html("<small  style='color:brown; text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.6);'><b>PLease Enter Your Password !</b></small>");
        $("#stupass").focus();
        return false;
    } 

    else{
        $.ajax({
            url:"student/addstudent.php",
            method: "POST",
            dataType: "json",
            data : {
                stusignup :"stusignup",
                stuname : stuname,
                stuemail : stuemail,
                stupass : stupass,
            },
            success:function(data){
                console.log(data);
    
                if(data == "ok"){
                    $('#success').html("<span> Registration Successful !</span>")
                    clear();
                }
    
                else if(data == "failed"){
                    $('#success').html("<span>Unable to register</span>")
                }
            }
        })
    }
    
}

//empty feilds
function clear(){
    $("#sf3").trigger("reset");
    $("#msg1").html(" ");
    $("#msg2").html(" ");
    $("#msg3").html(" ");
}

// student login

function login(){
    var stulogemail = $("#stulogemail").val();
    var stulogpass = $("#stulogpass").val();
    $.ajax({ 
        url:"student/addstudent.php",
        method: "POST",
        data:{
            check: "checking",
            stulogemail: stulogemail,
            stulogpass: stulogpass,     
        },
        success:function(data){
            if (data == 0){
                $("#logmsg").html("<small class='alert alert-danger'>Invalid E-mail id or Password!</small>")
            }
            else if (data == 1){
                $("#logmsg").html("<div class='spinner-border text-success' role='status'></div>")
                setTimeout(()=>{
                    window.location.href = "index.php";

                }, 1000);
            }   

        },

    });
}