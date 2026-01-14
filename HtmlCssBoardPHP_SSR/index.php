<?php

    header('Content-Type:text/html; charset=utf-8');

    // DB에 저장된 게시글 전체 데이터들을 가져와서 화면을 구성

    // MySQL DBMS와 연결
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!', 'mbc2025kjk');   // DB서버 주소, DB접속 아이디, DB접속 비번, DB명
    mysqli_query($db, 'set names utf8');  // 한글깨짐 방지를 위해 'set names utf8' 사용

    // 'web_board' 테이블에 저장된 모든 게시글 데이터를 가져오는 쿼리문(SQL 언어) 작성
    $sql= "SELECT * FROM web_board ORDER BY no DESC"; // 최신글이 위로 오도록 하기 위한 입력(ORDER BY 변수 DESC), WHERE 절이 없으면 모든 줄 데이터...를 불러와라
    //쿼리문 실행 요청
    $result= mysqli_query($db, $sql);  // 검색 요청 결과표를 리턴해 줌

    // 결과표($result)로 부터 게시글들을 한줄씩 가져와서 boards 배열에 저장하기.
    $boards= array(); // 빈 배열하기
    // 게시글 등록 개수를 알아내기

    $row_num= mysqli_num_rows($result);
    for($i=0; $i<$row_num; $i++){
        // 한 줄 데이타를 [연관배열:인덱스 번호 대신 key 를 사용하는 배열]로 내려받기
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
        // boards에 한줄 추가
        $boards[$i]= $row;
    }

    // MySQL DBMS와의 연결을 종료
    mysqli_close($db);

    // 게시글의 개수를 저장하는 변수
    $boards_size= count($boards);  //php 언어에서 배열의 길이를 알려주는 내장함수 count()

?>
<!-- .php 문서에서 html 코드를 쓰면 echo의 효과를 보이게 됨  -->

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <!-- 외부 스타일 시트 연결 -->
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    
    <!-- 콘텐츠가 표시되는 영역 -->
    <div class="board_wrap">

        <!-- 1. 게시판 제목 영역 -->
        <div class="board_title">
            <h2>자유 게시판</h2>
            <p>자유롭게 게시글을 작성하면서 이야기를 나누세요. [ <?php echo "총 게시글 수 : $boards_size";  ?> ]</p>
        </div>

        <!-- 2. 게시판 테이블이 그려질 메인 영역(테이블, 페이지네이션, 버튼 영역) -->
        <div class="board_list_wrap">
            <!-- 2.1 테이블영역 -->
            <table class="board_list">
                <!-- 1) 컬룸 제목줄 -->
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                    <th>조회</th>
                </tr>

                <!-- 2) 게시글에 데이터들(배열) [JS나 PHP의 반복문으로 그려내기] 우선 디자인만 확인하기 위해 가짜데이터 3줄 정도 -->
                <?php
                    for($i=0; $i<$boards_size; $i++){
                        // 한줄 단위 게시글 참조하기
                        $board= $boards[$i];

                        //게시글의 각 칸의 값들 뽑아오기
                        $no= $board['no'];
                        $name= $board['name'];
                        $title= $board['title'];
                        $message= $board['msg'];
                        $date= $board['date'];
                        $hits= $board['hits'];
                        // 비밀번호는 보여주지 않으니 변수 만들지 않아도 됨

                        // 한줄 데이터를 table요소의 tr, td 요소로 만들기
                        echo ("
                        <tr>
                            <td class='col_no'>$no</td>
                            <td class='col_title'><a href='./board/view.php?no=$no'>$title</a></td>
                            <td class='col_writer'>$name</td>
                            <td class='col_date'>$date</td>
                            <td class='col_hits'>$hits</td>
                        </tr>                        
                        ");
                    }  // for문....

                ?>
                
            </table>

            <!-- 2.2 페이지네이션 영역 -->
            <div class="board_pagination">
                <a href="#" class="btn">&lt;&lt;</a>
                <a href="#" class="btn">&lt;</a>
                <a href="#" class="btn selected">1</a>
                <a href="#" class="btn">2</a>
                <a href="#" class="btn">3</a>
                <a href="#" class="btn">4</a>
                <a href="#" class="btn">5</a>
                <a href="#" class="btn">&gt;</a>
                <a href="#" class="btn">&gt;&gt;</a>
            </div>

            <!-- 2.3 버튼 영역 -->
            <div class="btn_wrap">
                <a href="./board/write.php">새글 쓰기</a>

            </div>


         </div>

    </div>


</body>
</html>