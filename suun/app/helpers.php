<?php
function htmlencode($data, $mode = 'en')
{
    $result = array();
    $hw = array('’', '“', "＜", "＞", "＆");
    $fw = array("'", '"', "<", ">", "&");
    $cw = array("&apos;", "&quot;", "&lt;", "&gt;", "&amp;");
    if (is_array($data)) {
//$result=array_map('htmlencode',$data);
        foreach ($data as $k => $v) {
            $result[$k] = htmlencode($v, $mode);
        }
    } else {
        if (empty($mode)) $mode = 'en';

        switch (strtolower($mode)) {
            case 5:
                $result = str_replace($hw, $cw, $data);
                break;
            case 4:
                $result = str_replace($cw, $hw, $data);
                break;
            case'defw':
                case3:
                $result = str_replace($hw, $fw, $data);
                break;
            case'enfw':
                case2:
                $result = str_replace($fw, $hw, $data);
                break;
            case'de'://雙引號不解開
                case1:
                $result = htmlspecialchars_decode($data, ENT_NOQUOTES);
                break;
            case'deq'://全部解
                $result = htmlspecialchars_decode($data, ENT_QUOTES);
                break;
            case'en':
            case 0;
            default:
                $result = htmlspecialchars($data, ENT_QUOTES);
                $result = str_replace("&amp;amp;", "&amp;", $result);
                break;
        }
    }
    return $result;

}
