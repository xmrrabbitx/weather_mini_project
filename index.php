<!doctype html>
<html>
<head>


<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

<link rel="stylesheet" href="index.css">


</head>
<body dir="rtl">
<?php


require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$appkey = $_ENV['appid'];


$cityname = "Tehran";

$urlapi = "api.openweathermap.org/data/2.5/weather?q=" . $cityname . "&lang=fa&units=metric&appid=" . $appkey ;


$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch, CURLOPT_URL, $urlapi );

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);



$cityname = $data->name;

$status = $data->weather[0]->description;

$humidty = $data->main->humidity;

$wind = $data->wind->speed;

$temp = $data->main->temp;

$feels = $data->main->feels_like;

?>


<div class="container-fluid">

<div class="row">

<div id="w-sec" class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 mt-5 ">

<div id="weather-sec" class="col-12">

<div id="title" >
پیشبینی وضعیت آب و هوا
</div>
<div class="row">


<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">

<div class="mt-xl-2" id="name-sec"><?php print($cityname); ?></div>

<div class="mt-xl-2" id="status"><span>وضعیت:  </span><?php print($status); ?></div>

<div class="mt-xl-2" id="humidity"><span>میزان رطوبت:  </span><?php  print($humidty); ?></div>

<div class="mt-xl-2" id="wind"><span>شدت وزش باد:  </span><?php print($wind); ?></div>

<div class="mt-xl-2" id="temp"><span>دما:  </span><?php print($temp); ?></div>

<div class="mt-2" id="feeltemp"><span>دمای حس شده:  </span><?php print($feels); ?></div>

</div>

<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
<img id="raingif" src="/rain.gif">
</div>

</div>
</div>



</div>


<div class="col-xl-8 col-lg-8">

</div>

</div>

</div>





</body>
</html>
