<?php
    header('Content-Type:text/html; charset=utf-8');

    // 사용자가 POST방식으로 보낸 데이터 받기
    $name= $_POST['name'];
    $email= $_POST['email'];

    // 원래 백엔드 코드는 이런 값들을 DB에 넣거나. 비교하는 등의 작업코드가 쓰여짐
    // 이번 실습에서는 간단하게.. 받은 데이터를 그대로 응답해 주기.
    
    echo "$name - $email";

    
?>

