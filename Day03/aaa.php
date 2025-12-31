<?php

    header('Content-Type:text/html; charset=utf-8');

    // 사용자가 GET 방식으로 보낸 데이터를 받기
    $title= $_GET['title'];
    $message= $_GET['message'];

    // 데이터를 잘 받았는지 확인해 보기 위해.. 사용자(웹 브라우저)에 응답해 주기...
    echo "<h3>$title</h3>";
    echo "<p>$message</p>";


    
?>