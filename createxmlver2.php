<?php
    

    
    //include 'db_connect.php';
    include("dbcheck.php");
 
    //$db = new DB_Connect;
    //$db_connection = $db->connect();
    
    $sql = "select * from res;";
    $result = mysqli_query($db,$sql);
    // mysql쿼리문을 실행하여 $result변수에 결과저장
    //$result = mysqli_query($db_connection,$sql);
    
    $xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n";
    $xmlcode .="<res>\n";
     
    
     while($obj = mysqli_fetch_object($result))
     {
         //값이 저장 될 변수 = $쿼리결과가 저장된 변수 -> 실제 DB에서의 필드명;
         $resname=$obj->resname;
         $lat=$obj->lat;
          $long=$obj->long;
          $memberid=$obj->memberid;
 
          $xmlcode .= "<resname>$resname</resname>\n";
          $xmlcode .= "<lat>$lat</lat>\n";
         $xmlcode .= "<long>$long</long>\n";
        $xmlcode .= "<memberid>$memberid</memberid>\n";
     }
     mysqli_free_result($result);
     $xmlcode .= "</res>\n";
 
    //$xmlcode의 변수에 저장된 xml 내용을 저장할 디렉터리 위치를 만듬
     $dir = "./";
     $filename = $dir."/get_res.xml";
    //서버에 파일을 저장하게 하는 메소드 put_contents(파일이 저장될 위치, 저장될 내용)
    //C언어에서의 fopen(), frite(), fclose() 를 한꺼번에 실행하며
    //기존 데이터가 있다면 덮어쓰게되고, 기존 데이터가 없다면 새 파일을 생성한다.
     file_put_contents($filename, $xmlcode);
    //$db->close();
     mysqli_close($con);
?>