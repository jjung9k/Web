<?php
    header('Content-Type:text/html; charset=utf-8');

    // 사용자가 file을 보내면 실제 파일 데이타들은 임시저장소에 잠시 저장되며 
    // 이 php 문서에는 file의 정보만 전달 됨. 그 정보를 $_FILES[]라는 배열에 저장함.

    $file= $_FILES['img'];      // $_ 슈퍼전역 변수는 대문자로 사용

    //#file은 배열임. 전송된 파일의 메타정보를 가지고 있음.
    $file_name= $file['name'];      // 원본파일명.확장자 
    $file_size= $file['size'];      //파일사이즈(byte)   
    $file_type= $file['type'];      //파일타입(MIME type)
    $error= $file['error'];         //에러정보
    $temp_name= $file['tmp_name'];  //파일이 실제 데이터가 있는 임시저장소 위치(경로)

    // 파일정보가 제대로 되었는지 확인
    echo "$file_name <br>";
    echo "$file_size <br>";
    echo "$file_type <br>";
    echo "$error <br>";
    echo "$temp_name <br>";
    
    // 정보가 출력된다면 이 서버에 파일이 잘 전송되어 온 것임
    // 하지만 실제 파일데이터에는 임시저장소($temp_name)에 존재함
    // 그 파일은 이 php의 코드가 끝나면 서버에서 삭제됨.
    // 임시저장소에 있는 파일을 사라지지 않는 본인의 영역(html폴더 영역)으로 옮겨야 함
    // 그래서 옮길 곳의 위치와 파일명을 정해야 함.
    // 파일명이 중복되지 않도록 현재날짜를 이용
    $a= date('YmdHis');   //20251217125123
    $dst_name="./uploads/" . $a . $file_name;  // "./uploads/20251217125123.jpg"
    
    // 임시저장소($temp_name)의 파일을 목적하는 위치($dst_name)로 이동
    $result= move_uploaded_file($temp_name, $dst_name);  // 실행결과(성공여부 True/False)를 리턴
    if($result){
        echo "upload success";
    }else{
        echo "upload fail";
    }


?>
