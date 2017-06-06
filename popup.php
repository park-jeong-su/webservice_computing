<?php
session_start();

$name = $_SESSION["name"];
$biz = $_SESSION["biz"];
$email = $_SESSION["email"];
// php 에서 console 창에 띄우기 위한 함수
function debug_to_console( $data ) {

  if ( is_array( $data ) )
    $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
  else
    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

  echo $output;
}
debug_to_console($name);
debug_to_console($biz);
debug_to_console($email);
//debug_to_console($mid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Mountain King - Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/theme.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.7/typicons.min.css">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/pushy.css">
      <link rel="stylesheet" href="assets/css/masonry.css">
      <link rel="stylesheet" href="assets/css/animate.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/odometer-theme-default.css">
      <style>
        #map{
          height: 500px;
        }
        html,body{
          height: 100%;
          margin: 0;
          padding: 0;

        }
        #home{
          margin-bottom: 60px;
        }
      </style>
      <script>
        window.odometerOptions = {
          selector: '.odometer',
          format: '(,ddd)', // Change how digit groups are formatted, and how many digits are shown after the decimal point
          duration: 13000, // Change how long the javascript expects the CSS animation to take
          theme: 'default'
        };
      </script>
      <!-- 팝업창뛰우기 -->

      <script type="text/javascript">
        <!--
        function add_item(){
        // pre_set 에 있는 내용을 읽어와서 처리..
        var div = document.createElement('div');
        div.innerHTML = document.getElementById('pre_set').innerHTML;
        document.getElementById('field').appendChild(div);
      }

      function remove_item(obj){
        // obj.parentNode 를 이용하여 삭제
        // 마지막 노드를 삭제하는 것으로 바꾸자.
        document.getElementById('field').removeChild(obj.parentNode);
      }
    </script>

    <script>
      var email="<?php echo($email);?>";
      var lat,lng;
      function dodo(){

        console.log("click success!");

        var resname=$("#resname").val();
        var category=$("#category").val();
        var notice=$("#notice").val();
        var food=$("#food").val();
        var price=$("#price").val();


        console.log(resname);
        console.log(category);
        console.log(notice);
        console.log(food);
        console.log(price);
        console.log(lat);
        console.log(lng);
        console.log(email);
        $.ajax({
          type:"POST",
          url:"./addres.php",
          data:{email:email, resname:resname, category:category, notice:notice, lat:lat, lng:lng},
          dataType:"text",
          success:function(rtn){
            alert("식당추가에 성공하셨습니다.");
            location.href="./index.php";
          },
          error:function(e){
          }
        });


      }

    </script>



  </head>
  <body class="">


    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    <header id="home">
      <div class="container-fluid">
        <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
        <div class="container">
          <div class="row">


          </div>
          <!-- 이부분에 레스토랑 정보 입력 -->
          <h1> 레스토랑의 정보를 입력해주세요 </h1>
          <div class="jumbotron">



            <form class="form-horizontal">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">식당이름</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="resname" placeholder="식당이름">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">카테고리</label>
                <div class="col-sm-10">
                  <!--<input type="email" class="form-control" id="category" placeholder="카테고리">-->
                  <select id="category" class="form-control">
                    <option value="res">레스토랑</option>
                    <option value="hospital">병원</option>
                    <option value="hair">미용실</option>
                  </select>
                </div>
              </div>



              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">공지사항</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="notice" placeholder="공지사항">
                </div>
              </div>

              <div id="field" class="form-group">

              </div>

              <p>

                <a target="_blank" onclick="add_item()" class="btn btn-lg btn-danger" role="button">음식추가하기</a>
              </p>


            </form>

          </div>

          <!-- 음식 입력창 !! -->
          <div id="pre_set" class="row" style="display:none">
            <div class="col-md-4">
              <input type="email" class="form-control" id="food" placeholder="음식">
            </div>
            <div class="col-md-4">
              <input type="email" class="form-control" id="price" placeholder="가격">
            </div> 
            <button type="button" class="btn btn-primary btn-lg" onclick="remove_item(this)">음식삭제하기</button>
          </div>

          <h3>레스토랑의 위치를 선택해주세요</h3>
          <!--여기가 지도다.-->
          <div id="map">
          </div>
          <div class="jumbotron">
            <form class="form-horizontal">
              <p>
                <a target="_blank" onclick="dodo()" class="btn btn-lg btn-danger" role="button">식당추가하기</a>
              </p>
            </form>
          </div>

        </div>
      </div>
    </header>


    <script>
      var markers = [];
      function clearMarkers() {
        setMapOnAll(null);
      }
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
      function addMarker(map,location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
        alert('Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng());

        var infowindow = new google.maps.InfoWindow({
          content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
        });
        lat=location.lat();
        lng=location.lng();
        infowindow.open(map,marker);
      }
      function placeMarker(map, location) {

        var marker = new google.maps.Marker({
          position: location,
          map: map
        });

        alert('Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng());
        var infowindow = new google.maps.InfoWindow({
          content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
        });
        infowindow.open(map,marker);
      }
      function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter=new google.maps.LatLng(37.4865570,126.802001);
        var mapOptions = {center: myCenter, zoom: 8};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        google.maps.event.addListener(map, 'click', function(event) {
          deleteMarkers();
          addMarker(map,event.latLng);
        });
      }



    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW7DkrFwTai2f_ZVwEv3PqFcl8UcZ-YlA&callback=myMap"
    async defer></script>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap-scrollspy.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
        <script src="assets/js/masonry.js"></script>
        <script src="assets/js/pushy.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/odometer.js"></script>

      </body>
      </html>

      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-34344036-1', 'auto');
        ga('send', 'pageview');

      </script>
