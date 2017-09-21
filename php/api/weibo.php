<?php
    $id = isset($_GET['id'])? $_GET['id'] : '';

    // echo $id;

    // 读取json文件
    $file_path = 'data/weibo.json';

    $file = fopen($file_path,'r');

    $content = fread($file,filesize($file_path));

    $res = json_decode($content);
    // var_dump ($res);
    fclose($file);
    
    $current;
    
    foreach($res as $item) {
        if($item->id ==$id){
            $item->likecnt++;
            $current=$item;
        }
    }
     // var_dump ($res);

    $file = fopen($file_path,'w');
    fwrite ($file,json_encode($res,JSON_UNESCAPED_UNICODE));
    
    fclose($file);

    echo json_encode($current,JSON_UNESCAPED_UNICODE);

    
    // var_dump ($res);
?>