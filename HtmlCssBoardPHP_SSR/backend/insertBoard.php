<?php
    header('Content-Type:text/html; charset=utf-8');

    // write.php로 부터 POST 방식으로 전달될 입력값들 받기
    $title= $_POST['title'];   // 제목
    $name= $_POST['writer'];   // 글쓴이
    $password= $_POST['pw'];   // 비밀번호
    $message= $_POST['msg'];   // 내용 

    $password= password_hash($password, PASSWORD_DEFAULT);

    // 저장되는 날짜 
    $now= date('Y.m.d');
    $hits= 0;

    // "web_board" 테이블에 데이터들 저장(insert)
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!', 'mbc2025kjk');
    mysqli_query($db, 'set names utf8');

    $sql="INSERT INTO web_board(name, title, msg, date, hits, password) VALUES('$name','$title','$message','$now','$hits','$password')";
    $result= mysqli_query($db, $sql); // 삽입 요청 결과를 리턴(true, false)
    

    // 요청 결과에 따라 성공여부를 사용자측에 알려주기
    if($result){
        // 데이터 저장에 성공하면 사용자의 화면의 index 페이지로 다시 이동시켜야 함.
        // echo 에 내부 스크립트 코드를 만들어 응답
        echo "<script>window.location.href='../index.php'</script>";

    }else{
        echo "<h3>게시글 저장에 오류가 발생했습니다. 다시 시도해 주시기 바랍니다.</h3>";
    }

    mysqli_close($db);

?>
