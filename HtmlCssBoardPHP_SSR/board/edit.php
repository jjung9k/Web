
<!-- 글 작성 페이지를 그대로 복사하여 input 요소들에 미리 value 값을 지정. form요소의 action변경 -->

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <!-- 외부 스타일 시트 연결 [폴더경로 주의]-->
    <link rel="stylesheet" href="../css/write.css">
</head>
<body>
    
    <!-- 콘텐츠가 표시되는 영역 -->
    <div class="board_wrap">

        <!-- 1. 게시판 제목 영역 -->
        <div class="board_title">
            <h2>자유 게시판 - 게시글 수정</h2>
            <p>자유롭게 게시글을 작성하면서 이야기를 나누세요.</p>
        </div>

        <!-- 2. 게시글 작성 영역(글 작성, 버튼영역) -->
        <div class="board_write_wrap">

            <!-- 작성 내용을 서버에 전송하기 위해 form 요소 사용 -->
            <form action="../backend/updateBoard.php" method="post">

                <!-- 2.1 게시글 작성 영역-->
                <div class="board_write">
                    <!-- 2.1.1 제목 작성 영역 -->
                    <div class="title">
                        <div class="col_label">제목</div>
                        <div class="col_input"><input type="text" placeholder="제목 입력" value="글 제목 #1"></div>
                    </div>

                    <!-- 2.1.2 글쓴이/비밀번호 작성 영역 -->
                    <div class="info">
                        <div class="writer">
                            <div class="col_label">글쓴이</div>
                            <div class="col_input"><input type="text" placeholder="글쓴이 입력" value="sam"></div>
                        </div>
                        <div class="password">
                            <div class="col_label">비밀번호</div>
                            <div class="col_input"><input type="password" placeholder="비밀번호 입력" value="1111"></div>
                        </div>
                    </div>

                    <!-- 2.1.3 내용 입력 영역 -->
                    <div class="content">
                        <textarea placeholder="내용 입력">써 있던 글 내용</textarea>                        
                    </div>
                </div>
                <!-- 2.2 제출(글 저장)/ 취소 버튼영역 -->
                <div class="btn_wrap">
                    <input type="submit" value="수정 완료">
                    <!-- 버튼 클릭하면 이전페이지로 이동하기 위해 인라인 JS 작업 -->
                    <input type="button" onclick="history.back()" value="취소">


                </div>


            </form>


        </div>

       

    </div>


</body>
</html>
