<?php
$useList = array(
                                '西海岸的故事'=>'Li1314..',
                                '家有自己自温暖'=>'Li1314..',
                                );

foreach($useList as $k=>$v){
        locSign($k,$v);
}
function locSign($use,$pwd){
        $html = http_post('https://www.hostloc.com/member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes&inajax=1','fastloginfield=username&username='.urlencode($use).'&cookietime=2592000&password='.urlencode($pwd).'&quickforward=yes&handlekey=ls');
        if(!strrpos($html,'window.location.href')){echo $use.' login error<br>';return false;}
        $cookie = getCookie($html,'Set-Cookie: ',';');
        for($i=26200; $i<=26210; $i++){
                $html = http_get("https://www.hostloc.com/space-uid-{$i}.html",$cookie);
        }
        echo $use.' Sign ok!!!<br>';
}
function http_get($url,$cookie) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array('User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0','Cookie: '.$cookie));
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        $src = curl_exec($curl);
        curl_close($curl);
        return $src;
}
function http_post($url,$body){
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL,$url);  
        curl_setopt($ch, CURLOPT_HEADER, TRUE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $result = curl_exec($ch);  
        curl_close($ch);  
        return $result;    
}
function getCookie($str,$leftStr,$rightStr){
        if(strrpos($str,$leftStr) == false || strrpos($str,$rightStr) == false){return '';}
        $arr1 = explode($leftStr,$str);$i = 0;$cookie = '';
        foreach($arr1 as $k=>$v){$i++;if($i > 1){$arr2 = explode($rightStr,$v);$cookie .= $arr2[0].'; ';}}
        return $cookie;
}