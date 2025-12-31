<?php
    header('Content-Type:text/html; charset=utf-8');      // 헤더에는 콘텐츠 타입을 텍스트/html로 지정해 주고, 한글문자 나오게 utf-8 입력
    
    // 사용자가 POST방식으로 보낸 글씨 데이터(글제목, 글내용)를 받기
    $title= $_POST['title'];
    $message= $_POST['msg'];

    // 사용자가 보낸 파일은 별도로 받아야 함
    // 실제 파일데이터 덩어리는 임시저장소에 저장되고 
    // php문서에는 파일에 대한 정보를 가진 배열이 전달 됨
    $file= $_FILES['img'];

    // 파일정보들(5개) 중에서 필요한 것만 변수로 받기
    $file_name= $file['name'];       //원본파일명.확장자
    $file_size= $file['size'];       //파일크기(byte)
    $temp_name= $file['tmp_name'];   // 실제 파일데이터가 있는 임시저장소의 위치

    // 데이터들이 온전히 서버에 도착했는지 확인해보기
    echo "$title <br>";
    echo "$message <br>";
    echo "$file_name <br>";
    echo "$file_size <br>";
    echo "$temp_name <br>";

    //업로드된 실제 파일데이터는 임시저장소에 있기에 곧 사라짐.
    // 그래서 특정 폴더 위치로 이동해야 함.
    // 이동시킬 위치를 먼저 만들기

    $dst_name= "./file/" . date('YmdHis') . $file_name; // 현재 날짜시간 표기

    // 임시저장소()의 파일을 원하는 위치($dst_name)로 이동
    $move_result=move_uploaded_file($temp_name, $dst_name);    // 이동 결과를 true, flase 로....
    if($move_result){
        echo "<p>upload success</p>";

    }else{
        echo "<p>upload file</p>";
    }

    echo "<hr>";

    // 글씨 데이터와 파일데이터가 잘 도착한 것을 확인 하였음
    // 이제 데이터를 Database에 저장하기.

    // 0번.준비) Database에 [게시글 데이터]를 저장할 표(테이블:board)을 만들어 놓기
    // 0. 준비) board 테이블에 저장할 데이터들 확인($title, $messagge, $dst_name, $now)
    $now= date('Y-m-d H:i:s');

    // MySQL DBMS을 사용한 데이터 저장 작업

    // 1. MYSQL에 접속하기
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!', 'mbc2025kjk');  // DB서버주소, 접속아이디, 접속비밀번호, DB명
    // 2. MySQL은 기본적으로 한글이 깨짐 ->> utf8방식으로 문자셋을 설정해야 함. 'utf-8'은 HTML, PHP에서 사용.
    mysqli_query($db, 'set names utf8');

    // 3. 원하는 CRUD 작업에 대한 SQL 쿼리문을 작성하고 요청(실행)
    if($file_name){
        $sql= "INSERT INTO board(title, msg, file_path, reg_date) VALUES('$title','$message', '$dst_name', '$now')"; 
    }else{
        $sql= "INSERT INTO board(title, msg, reg_date) VALUES('$title','$message', '$now')";
    }
    
    $result= mysqli_query($db, $sql);  // 실행 결과를 리턴해 줌

    if($result){
        echo "<h3>INSERT SUCCESS!</h3>";
    }else{
        echo "<h3> INSERT FAIL n.n </h3>";
    }

    // 4. DB와 연결 종료
    mysqli_close($db);

?>