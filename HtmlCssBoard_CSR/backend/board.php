<?php
    header('Content-Type:application/json; charset=utf-8');

    // GET방식으로 전달된 no 값 추출
    $no= $_GET['no'];

    // web_board 테이블에서 no 번호에 해당하는 게시글을 찾아서 json으로 응답해 주기.

    $db= mysqli_connect('localhost','mbc2025kjk','a1s2d3f4!','mbc2025kjk');
    mysqli_query($db, 'set names utf8');

    #sql= "SELECT * FROM web_board WHERE no=$no;
    $result= mysqli_query($db, $sql);

    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);  // 한줄 의 연관배열

    //json 응답형식으로 만들어 echo
    $response= array();
    $response['status']= 200;
    $response['data']= $row;

    echo json_encode($response);





?>

