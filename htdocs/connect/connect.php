<?php
    // 기본 설정
    //로컬 서버
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "phpclass";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    // 잘 접속했는지 확인하는 방법
    // if(mysqli_connect_errno()){
    //     echo "Database Connect False";
    // } else {
    //     echo "Database Connect True";
    // }

    // $host = "localhost";
    // $user = "richclub9";
    // $pass = "Forever0!";
    // $db = "richclub9";
    // $connect = new mysqli($host, $user, $pass, $db);
    // $connect -> set_charset("utf8");
?>