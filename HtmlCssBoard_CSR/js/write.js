// 사용자가 form 요소의 submit 버튼을 눌렀을때 반응하는 함수를 등록해 놨음.

function submitBoard(){
    // form 요소는 제출버튼이 눌러지면 무조건 페이지를 변경함
    // CSR은 페이지 변경없이 서버와 통신해야 함
    // 그래서 form 요소의 기본 이벤트 동작을 막기 위해!!
    window.event.preventDefault();   // 기본동작을 방지하지마!(프리벤트디폴트)

    // 서버로 보낼 사용자 입력 데이터를 가져오기
    // form 요소와 input 요소들에 적용된 name 속성값들이 자동으로 'document' 객체의 하위속성으로 추가됨
    var title= document.boardForm.title.value;
    var name= document.boardForm.writer.value;
    var password= document.boardForm.pw.value;
    var message= document.boardForm.msg.value;

    // 서버에 보낼 데이터를 하나로 묶어서 보내기.  [json으로 만들어서 보내려고...]
    var data= {
        title: title,   // 식별자: 값
        writer: name,
        pw: password,
        msg: message
    }

    // data 객체를 json 문자열로 만들기
    var json_str= JSON.stringify(data); // JS 객체  --> Json 문자열

    // 이 json_str 문자열을 서버에 POST방식으로 전송 - ajax 기술로
    fetch('../backend/insertBoard.php', {
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: json_str
    })
    .then(function(reseponse){
        return reseponse.text();
    })
    .then(function(text){
        alert(text);
        // 서버 응답을 보여주는게 끝나면. index 페이지로 가기
        location.href="../index.html";
    })

}