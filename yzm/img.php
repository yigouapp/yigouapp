<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/6
 * Time: 16:35
 */
header("content-type:image/png");
//创建图片
//$img=imagecreate('200','100');
////imagecreatetruecolor();
////生成颜色
//$color1=imagecolorallocate($img,'33','44','66');
////imagecolorallocatealpha();透明
//
//$color2=imagecolorallocate($img,'222','11','69');
////填充背景色
//imagefill($img,'0','0',$color1);
////画直线
//imageline($img,'0','50','200','50',$color2);
////文本
//imagettftext($img,mt_rand(30,40),0,'30','50',$color2,'ARCENA.ttf','A4rfd');

//imagepng($img);
//imagedestroy($img);
//创建 图片
//参数： 宽 高
//$img=imagecreate('200','100');
//生成颜色，颜色依赖于图片，最终返回颜色
//$color=imagecolorallocate('相关的图片资源','红色0-255','绿色0-255','蓝色0-255');
//填充整个颜色<=>背景色
//imagefill('要操作的图片','开始绘制的x位置','开始绘制的y位置','颜色');

//每画一种图形都要填充颜色
//circle 圆
//imagefilledarc($img,'','','','','','');
//rect   矩形
//imagerectangle();
//imagefilledrectangle()
//ellipse 椭圆
//imagefilledellipse();
//line  画直线
//在谁上画 -> 开始坐标 -> end坐标 -> 颜色  默认一像素的line
//imageline(要操作的图片,'开始x','开始y','结束x','结束','颜色');
//point 点
//imagesetpixel();
//for ($i;$i<30;$i++){
//
//}

//text 文本
//imagechar();
//imagestring();
//参数：：1.在谁上画 -> 2.size 单位：磅 -> 3.角度 ：度 -> 4.文字开始的位置，以文字的基线为准 -> 5.结束的位置 -> 6.颜色 -> 7.字体文件 .ttf ->  8.画的字
//imagettftext('要操作的图片','文字的大小','角度','x位置','y位置','颜色','字体文件','要写的字');

//输出这张图片
//imagepng($img);

//释放资源 销毁图片资源
//imagedestroy($img);


//  验证码
//产生随机数的字符串
$str='qwertyuioplkjhgfdsazxcvbnm1234567890';
//创建图片
$img=imagecreate('100','50');
//函数生成颜色
function getcolors($img,$type='tint'){
    if ($type=='tint'){
        $min=130;
        $max=240;
    }else if ($type=='d'){
        $min=10;
        $max=120;
    }
//    随机生成颜色
    return imagecolorallocate($img,mt_rand($min,$max),mt_rand($min,$max),mt_rand($min,$max));
//    echo 1;
}
//$aa=getColor($img);
//var_dump($aa);
//给画布添加背景颜色
imagefill($img,'0','0',getcolors($img));
//用点点
for ($i=0;$i<30;$i++){
//    echo $i;
//    生成小点
    imagesetpixel($img,mt_rand(0,100),mt_rand(0,50),getcolors($img,'d'));
//    imagesetpixel($img,mt_rand(10,90),mt_rand(2,48),getcolors($img,'dark'));
}
//直线
for ($j=1;$j<mt_rand(1,3);$j++){
    imageline($img,mt_rand(20,30),mt_rand(20,40),mt_rand(80,90),mt_rand(20,40),getcolors($img,'d'));
}
//定义一个数组
$stryzm='';
//imagettftext('要操作的图片','文字的大小','角度','x位置','y位置','颜色','字体文件','要写的字');
for ($k=0;$k<4;$k++){
//    将产生的数字放入数组，做验证用
    $result=mt_rand(0,1)?substr($str,mt_rand(0,strlen($str)),'1'):strtoupper(substr($str,mt_rand(0,strlen($str)),'1'));
    imagettftext($img,mt_rand(15,25),mt_rand(-10,10),mt_rand(10+20*$k,10+20*($k+1)),mt_rand(35,40),getcolors($img,'d'),'../static/font/ARCENA.ttf',$result);
    $stryzm.=$result;
}
session_start();
//    将数组的值放入session
$_SESSION['string']=$stryzm;
//setcookie('string',$stryzm);
//输出这张照片
imagepng($img);
//释放资源
imagedestroy($img);