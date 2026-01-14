// 상세글 보기 화면에 전달된 번호(no)를 확인하기
// 주소줄의 URl 정보를 담당하는 BOM 객체를 이용
// alert(window.location.href );
// alert( location.search);  // URl 중에서 ?뒤에 글씨들

// location.search 데이터에서 '=' 글자를 기준으로 가르기..  2번째 칸에 번호가 존재함.
var no= location.search.split('=')[1];
// alert(no);

// no 에 해당하는 게시글을 서버에 요청하기
fetch('../backend/board.php?no='+no)
.then(function(response){
    return response.json();
    
})
.then(function(json){
// HTM 요소들을 찾아서 서버로부터 받을 값들을 보여주기
// 1) 글제목
document.querySelectorAll('.board_view .title')[0].innerHTML= json.data.title;

// 2) 글번호
document.querySelectorAll('.board_view .info .col1')[0].innerHTML= json.data.no;

// 3) 글쓴이
document.querySelectorAll('.board_view .info .col2')[0].innerHTML= json.data.name;

// 4) 작성일
document.querySelectorAll('.board_view .info .col3')[0].innerHTML= json.data.date;

// 5) 조회수
document.querySelectorAll('.board_view .info .col4')[0].innerHTML= json.data.hits;

// 6) 글 내용
document.querySelectorAll('.board_view .content')[0].innerHTML= json.data.msg; 

})