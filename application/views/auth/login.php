<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Check-Point Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/signin.css">
</head>

<body class="text-center">
    <form class="form-signin" id="login">
      <img class="mb-4" src="<?php echo base_url() ?>public/images/gps.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Check-Point</h1>
      <label for="inputUsername" class="sr-only">Student's ID</label>
      <input type="number" name="username" id="username" class="form-control" placeholder="Student's ID" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

      <div class="form-group">
          <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                  Don't have an account! 
              <a href="<?=base_url("auth/register")?>">
                  Sign Up Here
              </a>
              </div>
          </div>
      </div> 

      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>   
    </form>
    
    <script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
    <script>
        $("#login").submit(function(){
            login();
        });

        function login(){
            event.preventDefault();
    
            var data = $("#login").serialize();
            $.post(base_url+"api/auth/login",data,
                function(data){
                var message = data.message;
                if(message == "2001"){
                    localStorage.token = data.token;
                    localStorage.userId = data.userId;
                    alert("Welcome to Check-Point");
                    window.location = base_url+"user/user";
                }
                // else if(message == "2002"){
                //     $("#message").html("ไม่พบชื่อผู้ใช้งาน <a href='"+base_url+"/auth/register"+"'>ลงทะเบียน</a>");
                //     $("#error-message").show();
                // }else if(message == "2003"){
                //     $("#message").html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                //     $("#error-message").show();
                // }
                else{
                    alert("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                    // $("#error-message").show();
                }
            })
        
        }

    </script>

</body>
</html>