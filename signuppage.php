<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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
        <script>
        window.odometerOptions = {
          selector: '.odometer',
          format: '(,ddd)', // Change how digit groups are formatted, and how many digits are shown after the decimal point
          duration: 13000, // Change how long the javascript expects the CSS animation to take
          theme: 'default'
        };
        </script>

    <script>

        function dodo(){
            console.log("click success!");

            var phone=$("#inputphone").val();
            var password=$("#inputpw").val();
            var name=$("#inputname").val();
            var email=$("#inputEmail").val();
            var biz=$("#biz").val();

            console.log(phone);
            console.log(password);
            console.log(name);
            console.log(email);
            console.log(biz);


            $.ajax({
                type:"POST",
                url:"./signupcheck.php",
                data:{phone:phone, password:password, name:name, email:email,biz:biz},
                dataType:"text",
                success:function(rtn){
                alert("회원가입 성공하셨습니다.");
                document.location.href="./index.php";

                },
                error:function(e){
                }
            });

        }
    </script>
    </head>
    <body class="">
      <!-- Pushy Menu -->
    <?php
    include("nav.php");
    ?>

      <!-- Site Overlay -->
      <div class="site-overlay"></div>

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
                    <div class="jumbotron">
 

                        
                        <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">이메일</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="이메일">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">전화번호</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputphone" placeholder="번화번호">
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">비밀번호</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputpw" placeholder="비밀번호">
                            </div>
                          </div>
                        

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">이름</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputname" placeholder="이름">
                            </div>
                        </div>

                      

                        <div class="form-group">
                             <select name="biz" id="biz">
                            <option value="1">사업자</option>
                            <option value="2">사용자</option>
                            </select>
                        </div>

                        </form>


                        <p>
                        
                        <a target="_blank" onclick="dodo()" class="btn btn-lg btn-danger" role="button">회원가입</a>
                        </p>
                    </div>
                </div>
            </div>
        </header>
       

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
