function show(){
    alert('show');
    //document.write('show!!'); 별도 모듈 js는 document를 이용하여 직접 write 할 수 없음
    // 그래서 요소를 만들어서 그려내야 함.
    const h4= document.createElement('h4');
    h4.textContent= 'show!!';
    document.body.appendChild(h4);
}

// 외부에서 import 하여 사용하도록 하려면 'export' 해야함
export default show;  // 이 파일 문서 1개에서만 대표 export 가능

// 다른 함수를 만들면서 export 해보기.
export function addAnchorToBody(){
    const a= document.createElement('a');  // 요소
    const attr= document.createAttribute('href'); // 속성
    attr.value="https://www.naver.com";
    a.setAttributeNode(attr);
    a.textContent="네이버";

    document.body.appendChild(a);
    // document.body.innerHTML="<a href='.....'>네이버</a>"
}
// 위 함수를 외부에서 import 할 수 있도록 export 
// export addAnchorToBody;    //error --- defult 만이 별도로 export 할 수 있음

// 변수도 export
export const num=100;
export let name="sam";


