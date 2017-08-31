<?php
/**
* アニメーション画像(GIF)などのフレームごとの画像を最適化解除して取得します
*
* @param string $path
* @param int $frame_no
*/
function split_frame($path, $frame_no){
    try {
        $image = new Imagick($path);
        if($frame_no < 1 || $image->getNumberImages() < $frame_no) {
            throw new Exception('getImage Exception');
        }
        $image->setFirstIterator();
        $im = $image->coalesceImages();  // 超大事. これないと最適化解除できない
        for($i=1; $i<$frame_no; $i++)
         {
            $im->nextImage(); 
        }
    } catch (Exception $exc) {
        $im = $obj->getImage($n);
    }
    
    return $im;
}

$im = get_image_frame("im.gif", 1);
$im->writeImage("1.png");


