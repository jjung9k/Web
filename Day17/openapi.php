<?php
    header('Content-Type:application/xml; charset=utf-8');

    // php 에서 다른 서버에 요청하기 위한 라이브러리
    // curl : Client URL ~ CMD/TERMINAL 같은 CLI 환경에서 HTTP 통신을 위한 명령어

    // 1. curl 라이브러리 초기화를 요청하면 작업객체가 리턴 됨.
    $ch= curl_init();

    // 2. curl 에 설정하는 옵션들
    // 2.1) 요청할 서버 주소 URL 설정
    curl_setopt($ch, CURLOPT_URL, "http://www.w3schools.com/XML/cd_catalog.xml");

    // 2.2) 요청의 응답을 받겠다 라는 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // 2.3) POST 방식사용 설정(설정 안하면 자동 GET 방식)
    // 2.4) POST 방식으로 보낼 데이터를 설정

    // 3. 설정했으니 curl 작업 실행
    $result= curl_exec($ch);

    // 요청결과에 따라 사용측(JS)에 응답해 주기
    if($result==false){
        echo "실패: " . curl_error($ch);
    }else{
        echo $result;
    }

    //4. 요청서버와 연결 받기
    curl_close($ch);


?>