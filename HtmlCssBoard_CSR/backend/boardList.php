<?php
    header('Content-Type:application/json; charset=utf-8');


    $db= mysqli_connect('localhost','mbc2025kjk','a1s2d3f4!','mbc2025kjk');
    mysqli_query($db, "set names utf8");

    $sql= "SELECT * FROM web_board ORDER BY no DESC";  // no칸의 내림차순으로 모든 데이터
    $result= mysqli_query($db, $sql);

    if($result){
        $response= array(); // 빈 배열
        $response['status']= 200; // 응답코드 200 : 서버 요청 성공
        $response['response_message']= "OK";

        // 총 게시글 수
        $row_num= mysqli_num_rows($result);
        $response['total_size']= $row_num;

        //게시글 수 만큼 반복하며 연관배열 data에 넣기
        $rows= array(); // 빈 배열
        for($i=0; $i<$row_num; $i++){
            $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
            $rows[$i]= $row;
        }
        $response['data']= $rows;

        // 성공 응답 데이터를 연관배열 $response 에 잘 넣어 놓았음. 이제 json으로 응답.
        echo json_encode($response);

    }else{
        // 잘못 되었다고 응답  [형식: json]
        // PHP 언어에는 연관배열 json 문자열로 변환해 주는 기능이 내장되어 있음.
        // 그러니 응답할 데이터를 json 으로 힘들게 만들지 말고 연관배열로 만들어서 변환하여 응답

        $response= array(); // 빈 배열
        $response['status']= 500; // 응답코드 500 : 서버의 처리 중 오류 발생
        $response['response_message']= "Server ERROR";
        $response['total_size']= 0;
        $response['data']= [];

         echo json_encode($response); // 연관배열 --> json string
    }

    mysqli_close($db);


?>
