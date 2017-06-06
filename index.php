<?php
session_start();

$name = $_SESSION["name"];
$biz = $_SESSION["biz"];
$email = $_SESSION["email"];
$id=$_SESSION["id"];
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
$xml=simplexml_load_file("get_res.xml") or die("Error: Cannot create object");
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
          height: 90%;
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
      <script>

        function doit(){

          console.log("click success!");

          var email=$("#inputEmail").val();
          var password=$("#inputpw").val();

        //console.log(eid);
        //console.log(password);

        $.ajax({
          type:"POST",
          url:"./logincheck.php",
          data:{email:email, password:password},
          dataType:"text",
          success:function(rtn){
            alert("로그인의 성공하셨습니다.");
            location.href="./index.php";
          },
          error:function(e){
          }
        });


      }

    </script>
    <!-- 팝업창뛰우기 -->
    <script language="javascript">
      <!--
      function pop(){ 
        var url="popup.php";
        var option="resizable=yes, scrollbars=yes,status=yes,width=1000,height=1000";
        window.open(url,'test',option);
      }
//-->
</script>
<!-- 사용자 지도 보여주기 AJAX 만들기 -->



<!-- 지금 지도에 파싱하는건 아직 못함 ....카카오톡 그거 사이트 보고 변경하기. -->
<script>

  function gainmap(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      // 이곳에서 json 으로 받으면 좋은데
      //document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }

  xmlhttp.open("GET","gainmap.php?q="+str,true);
  xmlhttp.send();
}

function parxml(){

  GDownloadUrl("./get_res.xml", function(data) {
    var xml = GXml.parse(data);
    var markers = xml.documentElement.getElementsByTagName("marker");
    for (var i = 0; i < markers.length; i++) {
      var latlng = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
        parseFloat(markers[i].getAttribute("lng")));
      map.addOverlay(new GMarker(latlng));
    }
  });
}

</script>



</head>
<body class="">

  <?php
  include("nav.php");
  ?>
  <!-- Site Overlay -->
  <div class="site-overlay"></div>
  <?php
  if($biz==1){
    ?>
    <header id="home">
      <div class="container-fluid">
        <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
        <div class="container">
          <div class="row">
           <?php
           include("logo.php");
           ?>
           <div class="col-md-1 col-md-offset-8 col-xs-2 text-center">
            <div class="menu-btn"><span class="hamburger">&#9776;</span></div>
          </div>
        </div>
        <!-- 여기가 관리자 부분에 코드를 넣으면됨 -->
        <button type="button" class="btn btn-primary btn-lg" onclick="pop()">추가하기</button>
        <!-- 여기에 이름 추가하는 로직 -->
        <?php
        include("resbutton.php");
        ?>

      </div>
    </div>
  </header>
  <?php
}
else if($biz==2){
  ?>
  <header id="home">
    <div class="container-fluid">
      <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-10">
            <a href="#" class="thumbnail logo">
              <img src="images/your_logo.png" alt="" class="img-responsive">
            </a>
          </div>
          <div class="col-md-1 col-md-offset-8 col-xs-2 text-center">
            <div class="menu-btn"><span class="hamburger">&#9776;</span></div>
          </div>
        </div>
        <!-- 여기가 사용자 부분에 코드를 넣으면됨 -->
        <h1> 원하시는 항목을 선택해주세요. </h1>
        
        <select id="category" class="form-control" onchange="parxml()">
          <option value="res">레스토랑</option>
          <option value="hospital">병원</option>
          <option value="hair">미용실</option>
        </select>
        <div id="map">
        </div>

      </div>
    </div>
  </header>
  <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 37.4865570, lng: 126.802001},
        zoom: 8
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW7DkrFwTai2f_ZVwEv3PqFcl8UcZ-YlA&callback=initMap"
  async defer></script>
  <?php
}
else{
  ?>
  <header id="home">
    <div class="container-fluid">
      <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-10">
            <a href="#" class="thumbnail logo">
              <img src="images/your_logo.png" alt="" class="img-responsive">
            </a>
          </div>
          <div class="col-md-1 col-md-offset-8 col-xs-2 text-center">
            <div class="menu-btn"><span class="hamburger">&#9776;</span></div>
          </div>
        </div>
        <div class="jumbotron">
          <h1><small>In the hall of the</small></br>
            <strong>Mountain King</strong></h1>
            <p>This is a simple hero unit, a simple jumbotron-style component for<br>
              calling extra attention to featured content or information.</p>


              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">이메일</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="이메일">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">비밀번호</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputpw" placeholder="비밀번호">
                  </div>
                </div>
              </form>


              <p>
                <a class="btn btn-primary btn-lg" role="button" onclick="doit()">로그인</a> 
                <a target="_blank" href="./signuppage.php" class="btn btn-lg btn-danger" role="button">회원가입</a>
              </p>
            </div>
          </div>
        </div>
      </header>
      <?php
    }
    ?>


    <?php
    include("namugi.php");
    ?>
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
