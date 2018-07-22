<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
      <br>
      <h2>รายวิชาที่ลงเรียน</h2>
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
                    <p class="text-center">
                        <a href="#" class="btn btn-primary">Check Point</a>
                    </p>
                  </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js"); ?>"></script>
</body>
</html>