<?php /**获取随机图片 @author 青柠**/
$txt = "img.txt"; 
if(file_get_contents($txt)){
    $data = file($txt); 
    $num = count($data); 
    $id = mt_rand(0,$num-1); 
    $url = chop($data[$id]); 
    header("location:$url");
}