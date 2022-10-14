<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // 블로그 쓸 때는 마이멤벙 아이디 필요함 //nl2br메서드 사용시 줄바꿈 그대로 가져옴
    $myMemberID = $_SESSION['myMemberID'];
    $blogAuthor = $_SESSION['youName'];
    $blogCate = $_POST['blogCate'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);
    $blogView = 1;
    $blogLike = 0;
    $regTime = time();

    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    // 이차배열 확인 : 배열안에 배열
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];

    // echo $blogImgType;


    // echo "<pre>";
    // var_dump($blogImgFile);
    // echo "</pre>"

    // array(5) {
    //     ["name"]=>
    //     string(17) "1595073809595.jpg"
    //     ["type"]=>
    //     string(10) "image/jpeg"
    //     ["tmp_name"]=>
    //     string(36) "/Applications/MAMP/tmp/php/phpaSc2AZ"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(47345)
    //   }

    //이미지 파일명 확인
    $fileTypeExtension = explode("/", $blogImgType);
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1]; //png

    //이미지 사이즈 확인 //history.back(1) 다시 원래대로 사이트 첫페이지로 보내는것.
    if($blogImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
        exit;
    }

    //이미지 타입 확인
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $blogImgDir = "../assets/img/blog/";
            // time메서드 만 이천얼마나옴 -> 이미지명이 같으면 처음꺼 삭제될 수 있으니 이미지 이름 무작위로 지어주기
            $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
            echo "이미지 파일이 맞네요!";
        } else {
            echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
        }
    } else if ($fileType == "" || $fileType == null){
        echo "이미지를 첨부하지 않았습니다.";
    }
?>

</body>
</html>