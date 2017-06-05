<?php
    include 'db_config.php';
    
    class DB_Connect {        
        function connect() {
            //DB와의 연결 을 시도
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
            //DB선택
            $select_db = mysqli_select_db(DB_NAME);
            //DB와의 커낵션 정보를 돌려줌
            return $connect;        
        }
        function close() {
            //mysqlDB의 연결을 끊음
            mysql_close();
        }
    }
?>