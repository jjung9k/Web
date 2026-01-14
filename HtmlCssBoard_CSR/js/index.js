// CSR 은 JS를 이용하여 웹문서의 DOM 요소를 생성하여 그려내는 방식
// JS 스크립트를 head 영역에 연결했다면.. 아직 body 요소가 만들어지기 전임.
// 그럼.. 데이터가 있어도.. tr, td 요소를 추가할 수 없음.
// 그래서 body 요소의 load 가 완료되면 발동하는 이벤트에 반응하는 함수를 미리 등록
function loaded(){
    // JS를 이용하여 서버DB에서 게시글 데이터들 모두 가져오기 요청  - ajax기술 사용 

    // 서버에서 응답하는 값이 여러개임. 그래서 응답 문자열을 json 표기법을 많이 사용함.
    // 우선 백엔드에서 데이터를 불러오는 연습만.. 하기 위해 가짜 응답용 boardList.json 파일 만들어 연습

    // JS에서 HTTP 요청 작업은 XMLHttpRequest 라는 객체를 생성하여 해야 함. 좀 불편함.
    // 그래서 fetch() 라이브러리 사용. axiox() 외부 라이브러리도 매우 많이 사용함.
    // 이 작업은 서버환경에서만 가능( Dothome or LiveServer )
    // [경로주의] 이 JS는 여기서 실행되는 것이 아니라 <script>태그로 연결된 html에서 실행됨.
    // 즉, Js파일의 위치와 상관없이 index.html 이 있는 위치를 기준으로 
    // fetch('../backend/boardList.json')
    // .then( function(response){
    //     return response.text();
    // })
    // .then( function(text){
    //     alert(text);

    // })

    // 응답받은 json 파일을 JS의 객체로 만들어서 멤버속성값들을 사용하는 것임. 즉, json 분석(parsing)
    // fetch()의 기능안에 이미 json을 분석하여 JS용 객체로 주는 기능이 존재함.
    fetch('./backend/boardList.php')
    .then(function(response){
        return response.json();  // json string --> JS object
    })
    .then(function(json){
        // 객체가 잘 되었는지 확인
        //alert(json.status+"\n"+json.response_message+"\n"+json.total_size);

        // JS 로 화면에 필요한 데이터들을 그려내기
        // 1) 제목영역에 [총 게시글 수 : 1] 표시하기

        var p= document.querySelectorAll('.board_title p')[0];
        p.innerHTML= `자유롭게 게시글을 작성하면서 이야기를 나누세요. [총 게시글 수 : ${json.total_size}]`;

        //2) 반복문으로 게시글 리스트 개수만큼 table 의 자식요소로 tr, td를 추가하기
        // for(var i=0; i<json.total_size; i++){
        //     var row= json.data[i];

        // }
        // 위 반복문을 더 간결하게 해주는 for ... of ...  [파이썬의 for ~ in 과 비슷]
        for(row of json.data){
            var s="";
            s += '<tr>';
            s += `<td class="col_no">${row.no}</td>`;
            s += `<td class="col_title"><a href="./board/view.html?no=${row.no}">${row.title}</a></td>`;
            s += `<td class="col_writer">${row.name}</td>`;
            s += `<td class="col_date">${row.date}</td>`;
            s += `<td class="col_hits">${row.hits}</td>`;
            s += '</tr>';

            // JS

            document.querySelectorAll('.board_list')[0].innerHTML += s;
            
        }  // for문....

    }) 
    

} //loaded function....