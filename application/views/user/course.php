<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Check-Point <img class="mb-4" src="<?php echo base_url() ?>public/images/gps.png" alt="" width="15" height="15"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url("user/user"); ?>">รายวิชา<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">เวลาเรียน</a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="hidden-xs"><?=$this->session->userdata['logged_in']['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            <a href="#" class="btn btn-default">Profile</a>
                            </div>
                            <div class="pull-right">
                            <a href="#" class="btn btn-default">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
      <br>
      <h2>รายวิชา</h2>
      <div class="panel panel-default">
        <div class="panel-body"></div>
      </div>
      <br>

        <div class="row">
            <?php foreach($allCourse->result() as $course){ ?>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?=textLenght($course->course_name, 30) ?></h5>
                    <p class="card-text"><?=textLenght($course->course_decsription, 40) ?></p>
                    <p class="card-text"><i class="far fa-clock"></i> <?=$course->starttime ?> - <?=$course->endtime ?></p>
                    <p class="text-center">
                        <a href="<?=base_url("user/user/checkpoint/".$course->course_id); ?>" class="btn btn-primary">Check Point</a>
                    </p>
                  </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js"); ?>"></script>
    <script src="<?=base_url("public/js/fontawesome.js"); ?>"></script>
</body>
</html>