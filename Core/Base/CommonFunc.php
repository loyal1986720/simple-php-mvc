<?php
/**
 * Created by PhpStorm.
 * User: liuyong
 * Date: 16/7/5
 * Time: 下午2:54
 */
/**
 * 加载配置文件
 * @param $path
 * @return mixed
 */
function load_config($path){
    return require_once APPPATH.'/Config/'.$path.'.php';
}

/**
 * 加载视图文件
 * @param $file
 * @param array $data
 * @param bool|false $_return
 * @return string
 */
function views($file,$data=[],$_return=false){
    ob_start();
    $viewPath = APPPATH.'/Views/'.$file.'.php';
    extract($data);
    include($viewPath);
    if($_return){ //作为参数返回
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }else{
        ob_end_flush();
    }
}

function show_error($message){
    views('core/show_error',['message'=>$message]);
    exit;
}
