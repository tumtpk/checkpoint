<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/all.css">

    <style>
        <style>

        body{
             /* position: absolute;  */
        }
        .round-button {
            width:350px;
            margin-left: 38%;
        }
        .round-button-circle {
            width: 100%;
            height:0;
            padding-bottom: 93%;
            border-radius: 50%;
            border:10px solid #cfdcec;
            overflow:hidden;
            
            background: #4679BD; 
            box-shadow: 0 0 3px gray;
            -webkit-animation: glowing 1500ms infinite;
            -moz-animation: glowing 1500ms infinite;
            -o-animation: glowing 1500ms infinite;
            animation: glowing 1500ms infinite;
        }
        .round-button-circle:hover {
            background:#30588e;
        }
        .round-button a {
            display:block;
            float:left;
            width:100%;
            padding-top:48%;
            padding-bottom:50%;
            line-height:1em;
            margin-top:-0.5em;
            margin-left: 0%;
            
            text-align:center;
            color:#e2eaf3;
            font-family:Verdana;
            font-size:30px;
            font-weight:bold;
            text-decoration:none;
        }

        @-webkit-keyframes glowing {
            0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
            50% { background-color: #B20000; -webkit-box-shadow: 0 0 100px #B20000; }
            100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
        }

        @media only screen and (max-width: 600px) {
            .round-button {
                width:300px !important;
                margin-left: 10% !important;
            }

            .round-button a {
                margin-left: 0% !important;
            }
        }

    </style>
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
                    <a class="nav-link" href="<?=base_url("user/user")?>">รายวิชา<span class="sr-only">(current)</span></a>
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

    <div class="text-center" >
      <h2><?=$course->course_name ?></h2>
      <div class="panel panel-default">
        <div class="panel-body"></div>
      </div>
      <br><br>

        <div class="round-button" id="btn-check" style="display: none;">
            <div class="round-button-circle">
                <a href="#" class="round-button" onclick="getLocation()">Check-In</a>
            </div>
        </div><br>

        <h5 id="timeout" style="display: none;"><i>ยังไม่ถึงเวลาที่กำหนด</i></h4>
    </div>

    <div id="map"></div>

    <input type="hidden" id="checktime" value="<?=$checktime->time ?>">
    <input type="hidden" id="start" value="<?=$course->starttime ?>">
    <input type="hidden" id="end" value="<?=$course->stoptime ?>">
    

    <script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js"); ?>"></script>
    <script src="<?=base_url("public/js/fontawesome.js"); ?>"></script>

    <script type="text/javascript">

        var time = $("#checktime").val();
        var start = $("#start").val();
        var end = $("#end").val();
        var btnCheck = $("#btn-check");
        var timeout  = $("#timeout");
        
        callme();

        function callme(){
            if(time == ""){
                btnCheck.hide();
                timeout.show();
            }else{
                var d = new Date();
                var h = d.getHours();
                var m = d.getMinutes();
                var s = d.getSeconds();
                var now = h+":"+m+":"+s;
                if(start <= now){
                    btnCheck.show();
                    timeout.hide();
                }else{
                    btnCheck.hide();
                    timeout.show();
                }
            }
            setTimeout(callme, 5000);
        }

        var bermudaTriangle = null;
        function myMap(){
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: {lat: 8.641690, lng: 99.892457},
            mapTypeId: 'terrain'
            });

            var triangleCoords = [
                {lat: 8.646329, lng: 99.892334},
                {lat: 8.646488, lng: 99.897344}, 
                {lat: 8.642426, lng: 99.902311},
                {lat: 8.641100, lng: 99.902311},
                {lat: 8.636666, lng: 99.897290},
                {lat: 8.641079, lng: 99.892441}
            ];
            bermudaTriangle = new google.maps.Polygon({paths: triangleCoords});
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var result = google.maps.geometry.poly.containsLocation(point, bermudaTriangle)?true:false;
            setCheckIn(result);
        }

        function setCheckIn(result){
            alert(result);
        }

    </script>

    <script async defer src="https://maps.google.com/maps/api/js?libraries=geometry&key=AIzaSyDXPSZi00oTyASzmu_SzAoA9r2H4zQqT6U&amp;callback=myMap"></script>
</body>
</html>