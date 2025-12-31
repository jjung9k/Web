<?php
    header('Content-Type:text/html; charset=utf-8');

    // 전송된 실제파일의 데이터덩어리 임시저장소(tmp/)에 위치하고...
    // 이 php문서에는 파일정보가 전달됨.[6칸 짜리 배열]
    $files= $_FILES['aaa'];  // 파일들의 정보가 전달되어 옴. 즉, 2차원 배열

    // $files 의 갯수 확인
    echo count($files) . "<br>";  // 출력하면 6개로 나옴
    // 전송의 파일의 갯수를 확인하려면.. 6칸의 정보 중에서 아무 칸이나 잡아서 갯수 확인
    echo count($files['name']) . "<br>";  // 선택된 파일의 갯수가 출력
    echo "<hr>";

     // 선택된 파일 개수만큼 정보를 출력해보기
    $file_num= count($files['name']);

    for($i=0; $i<$file_num; $i++){
        $file_name= $files['name'][$i];
        $file_type= $files['type'][$i];
        $file_size= $files['size'][$i];
        $temp_name= $files['tmp_name'][$i];

        echo "$file_name $file_type $file_size $temp_name<br>";

        // 임시저장소의 파일을 원하는 위치로 이동해야 영구 저장
        $dst_name= './file/' . date('YmdHis') . $file_name;
        $result= move_uploaded_file($temp_name, $dst_name);
        if($result) echo "파일 저장 성공";
        else echo "파일 저장 실패";

        echo "<hr>";
        } //for-end 중괄호 표시

?>