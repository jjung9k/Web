<?php

    header('Content-Type:text/html; charset=utf-8');
    
    // 사용자가 보낸 데이터를 받기... POST방식으로 보낸 데이터는 $_POST[] 슈퍼전역변수에 받아져 있음.
    $user_id= $_POST['user_id'];
    $user_pw= $_POST['user_pw'];

    // 사용자[web browser]에게 출력(응답:response)
    echo "아이디: $user_id <br>";
    echo "비밀번호: " . $user_pw;    // php 언어에서는 .(점) 연산자가 문자열의 결합연산자로 사용한다.




?>



