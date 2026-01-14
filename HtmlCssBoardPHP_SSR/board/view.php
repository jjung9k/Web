<?php
    header('Content-Type:text/html; charset=utf-8');
    // 선택한 게시글을 DB에서 검색하여 보여줘야 함.
    // 선택한 게시글 번호는 GET방식을 전달되어 옴. [/board/view.php?no=$no=1]
    $no= $_GET['no'];

    // MySQL DBMS에 접속하여 데이터 가져오기
    $db= mysqli_connect('localhost', 'mbc2025kjk', 'a1s2d3f4!', 'mbc2025kjk');
    mysqli_query($db, 'set names utf8'); // 한글깨짐 방지

    // 'web-board' 테이블에서 선택된 no 에 해당되는 게시글 한 줄 가져오기 위한 쿼리문
    $sql= "SELECT * FROM web_board WHERE no=$no";
    // 위 쿼리문 실행하여 결과 받기
    $result= mysqli_query($db, $sql);

    // 결과표($result)에서 한줄 데이터를 연관배열로 읽어오기
    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);    

    $no= $row['no'];
    $name= $row['name'];
    $title= $row['title'];
    $message= $row['msg'];
    $date= $row['date'];
    $hits= $row['hits'];
    $password= $row['password'];

    // 글내용 $message 는 줄바꿈 문자를 /n 으로 저장하고 있음.
    // 사용자 화면 브라우저는 <br>태그를 써야 하기에 글자 변환 필요
    $message= nl2br($message);  // 줄바꿈 처리

    // [추가] 조회수 업데이트 -------------------------------------------------------
    //if( $회원이름 == $name ){   }
    // 조회수 hits 칸의 값을 1 증가하는 쿼리문 작성
    $sql= "UPDATE web_board SET hits=hits+1 WHERE no=$no";
    mysqli_query($db, $sql);

    // ---------------------------------------------------------------------------

    //MySQL 연결종료
    mysqli_close($db);

?> 

<!-- ph에서 ? ?> 영역 밖에 쓰면 echo의 효과와 같음 -->
<?php  /* include  "aaa.html" */ ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <!-- 외부 스타일 시트 연결 [폴더경로 주의]-->
    <link rel="stylesheet" href="../css/view.css">

</head>
<body>
    
    <!-- 콘텐츠가 표시되는 영역 -->
    <div class="board_wrap">

        <!-- 1. 게시판 제목 영역 -->
        <div class="board_title">
            <h2>자유 게시판 - 상세글 보기</h2>
            <p>자유롭게 게시글을 작성하면서 이야기를 나누세요.</p>
        </div>

        <!-- 2. 상세글이 표시될 영역( 글내용, 버튼영역 ) -->
        <div class="board_view_wrap">
            <!-- 2.1 게시글 표시 영역 -->
            <div class="board_view">
                <!-- 2.1.1 제목 영역 -->
                <div class="title">
                    <?php echo $title; ?>                    
                </div>
                <!-- 2.1.2 (번호, 작성자, 작성일, 조회수) 정보 표기 영역 -->
                <div class="info">
                    <!-- definiation list로 항목들 만들어보기 [JS or PHP를 통한 데이터 표시]-->
                    <dl>
                        <dt>번호</dt>
                        <dd><?= $no ?></dd>
                    </dl>
                    <dl>
                        <dt>글쓴이</dt>
                        <dd>sam</dd>
                    </dl>
                    <dl>
                        <dt>작성일</dt>
                        <dd>2026.01.12</dd>
                    </dl>
                    <dl>
                        <dt>조회</dt>
                        <dd>10</dd>
                    </dl>
                </div>

                <!-- 2.1.3 글 내용 영역 -->
                <div class="content">
                    <?= $message ?>                               
                </div>

            </div>


            <!-- 2.2 버튼 영역 -->
            <div class="btn_wrap">
                <a href="../index.php">목록</a>
                <a href="./edit.php">수정</a>
            </div>

        </div>

      
       

    </div>


</body>
</html>