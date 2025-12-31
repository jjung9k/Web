<?php
    header('Content-Type:text/html; charset=utf-8');

    // 사용자가 입력한 다양한 값들을 받기
    $user_name= $_GET['user_name'];
    $user_password= $_GET['user_pw'];
    $gender= $_GET['gender'];
    $message= $_GET['msg'];
    $car_brand= $_GET['brand'];

    //여러줄 입력에 사용한 textarea 의 줄바꿈을 \n으로받음.
    // 하지만 결과를 보여주는 browser는 <br>태그를 사용해야 줄바꿈 됨.
    $message= nl2br($message);

    // 전달된 값들 출력하기
    echo "$user_name<br>";
    echo "$user_password<br>";
    echo "$message<br>";
    
    // 다중선택 된 과일종류들 취득.. 배열로 전달되어 옴.
    $fruits= $_GET['fruits'];
    // 선택된 과일의 갯수를 취득하기.
    $num= count($fruits);
    // $num의 개수만큼 반복하여 배열요소값들을 출력.

    for($i=0; $i<$num; $i++){
        echo "$fruits[$i],";
    }
    
    echo "$gender<br>";

    
    echo "$car_brand<br>";
    
   
?>

