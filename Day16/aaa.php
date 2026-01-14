<?php
    header('Content-Type:text/html; charset=utf-8');

    // 사용자가 GET방식으로 보낸 데이터 받기
    $name= $_GET['name'];
    $email= $_GET['email'];

    // 원래 백엔드 코드는 이런 값들을 DB에 넣거나. 비교하는 등의 작업코드가 쓰여짐
    // 이번 실습에서는 간단하게.. 받은 데이터를 그대로 응답해 주기.
    // echo "$name $email 정보가 등록 되었습니다.";

    // 기존의 사용자 페이지가 이 php에서 응답하는 페이지로 바뀜
    // 그래서 사용자가 원래 보던 모습 그대로에 응답 데이터만 보여주려면..
    // 이곳에 사용자의 원래웹페이지를 다시 모두 작성함
    echo ("

    <!DOCTYPE html>
    <html lang='ko'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>ajax network </title>
    </head>
    <body>
        <h3>회원 가입</h3>

        <!-- HTML 에서 서버에 사용자 입력데이터를 전송해는 요소 form -->
        <form action='./aaa.php' method='get'>
        <input type='text' placeholder='이름' name='name' value='$name'>
        <input type='text' placeholder='이메일' name='email' value='$email'> 
            
            <input type='submit'>
        </form>
        <!-- 백엔드 php에서 전송된 [이름, 이메일]을 잘 전달 받았는지 응답을 해주면 이를 보여주기-->
        <hr>
        <textarea id='ta' cols='50' rows='20'>$name $email 정보가 성공적으로 등록 되었습니다.</textarea>
    </body>
    </html>
    
    ");
?>

