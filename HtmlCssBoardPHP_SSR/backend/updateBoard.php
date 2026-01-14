<?php
    header('Content-Type:text/html; charset=utf-8');
 
    // 1. POST 방식으로 전달 된 수정 데이터 받기
    $no= $_POST['no'];    
    $title= $_POST['title'];
    $name= $_POST['writer'];
    $hits= $_POST['hits'];
    $message= $_POST['msg'];

    // 2. DB 접속
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!', 'mbc2025kjk');

    if(!$db){
        die("DB 접속 실패: " . mysqli_connect_error());
    }

    mysqli_set_charset($db, 'utf8');

    // 3. prepare Statement 를 이용한 업데이트 쿼리 작성
    $sql= "UPDATE web_board SET title=?, name=?, hits=?, msg=? WHERE no=?";

    $stmt= mysqli_prepare($db, $sql);

    if($stmt){
        // 4. 데이터 바인딩
        mysqli_stmt_bind_param($stmt, "ssisi", $title, $name, $hits, $message, $no);

        $result= mysqli_stmt_execute($stmt);   // 5. 실행

        if($result){    // 수정 성공 시 상세 보기 페이지로 다시 이동
            echo "<script>
                alert('게시글이 수정되었습니다~!');
                location.href='./view.php?no=$no';
                </script>";
        } else{
            echo "게시글 수정 중 오류가 발생했습니다: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);  // 6. 연결 종료

    } else{
        echo "쿼리 준비 실패: " . mysqli_error($db);
    }

    mysqli_close($db);

?>
