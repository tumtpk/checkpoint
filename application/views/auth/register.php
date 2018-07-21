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
    <form class="form-signin" id="register">
      <img class="mb-4" src="<?php echo base_url() ?>public/images/gps.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Create your Account</h1>
      <div class="text-left">
      <label for="inputPassword" class="sr-only">Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
      <label for="inputUsername" class="sr-only">Student's ID</label>
      <input type="number" name="username" id="username" class="form-control" placeholder="Student's ID" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" name="course1" value="343"> SWE-343 Service Oriented Architecture and Web Service Technology
            </label>
            <label>
            <input type="checkbox" name="course2" value="387"> SWE-387 Database Application
            </label>
        </div>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    
      <div class="form-group">
          <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" > 
              <a href="<?=base_url("auth/login")?>">
                  Sign In Here
              </a>
              </div>
          </div>
      </div> 
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>   
    </form>
    
    <script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
    <script>
        $("#register").submit(function(){
            register();
        })


        function register(){
            event.preventDefault();
            
            var data = $("#register").serialize();
            $.post(base_url+"api/auth/register",data,
                function(data){
                    if(data.message == "200"){
                        alert("บันทึกสำเร็จ");
                        window.location.href = base_url;
                    }else{
                        alert("บันทึกไม่สำเร็จ");
                    }
                }
            )
        }
    </script>
</body>
</html>