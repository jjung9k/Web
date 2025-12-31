<?php
    header('Content-Type:text/html; charset=utf-8');

    // 1. MySQL 접속하기
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!','mbc2025kjk');  // DB

    //2. 한글깨짐 방지 요청
    mysqli_query($db, 'set names utf8');

    //3. 원하는 CRUD 작업에 대한 쿼리문 작성 및 요청 - board 테이블에 있는 모든 데이터를 선택
    $sql="SELECT * FROM board";
    $result= mysqli_query($db, $sql);    // 검색 쿼리에 해당하는 결과표(가상의 테이블)을 리턴해 줌
    // 혹시 쿼리문이 잘못되면 False가 리턴 되어 옴

    if($result){
        // 결과표에서 읽어온 총 레코드(한줄 row) 수를 확인해 보기.
        $row_num= mysqli_num_rows($result); 
        echo "<p>총 게시글 수 : $row_num</p>";

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>번호</th>";
        echo "<th>글 제목</th>";
        echo "<th>글 내용</th>";
        echo "<th>작성일</th>";
        echo "<tr>";

        // $result 결과표에서 한줄씩 게시글 데이터를 가져오기. -- 글 개수만큼 반복하여 한줄씩
        for($i=0; $i<$row_num; $i++){
            $row= mysqli_fetch_array($result, MYSQLI_ASSOC);   // 패치(fetch)는 내려받을 때 사용, MYSQLI_ASSOC 연관배열로 한줄 데이터 받기

            // 각 칸(column)별로 데이터를 뽑아서 변수에 저장
            $no= $row['no'];
            $title= $row['title'];
            $message= $row['msg'];
            $file_path= $row['file_path'];
            $reg_date= $row['reg_date'];

            // textarea 요소로 입력한 여러줄 글씨는 웹브라우저에서 줄바꿈으로 보이지 않음
            // 왜? 
            // '\n' =>> <br>태그로 변경
            $message= nl2br($message);

            // 각각의 값들을 사용자 화면(웹브라우저)에 응답해주기..
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$title</td>";

            echo "<td>";
            echo "<p>$message</p>";

            if($file_path){
            echo "<img src='$file_path' alt='첨부 이미지' width='300'>";
            }
                        
            echo "</td>";
            echo "<td>$reg_date</td>";
            echo "</tr>";      
    } 
            echo "</table>";

            }else{
            echo "<p>검색이 실패했습니다</p>";
     
            }

    // 4. MySQL 접속 종료
    mysqli_close($db);


?>
