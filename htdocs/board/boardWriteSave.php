<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    // real_escape_string 특수기호 이런거 방지
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardView = 1;
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];
    $sql = "INSERT INTO myboard(myMemberID, boardTitle, boardContents, boardView, regTime) VALUES('$myMemberID','$boardTitle', '$boardContents', '$boardView', '$regTime')";
    $connect -> query($sql);
?>
<script>
    location.href = "board.php";
</script>