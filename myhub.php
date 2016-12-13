<?php
if(isset($_REQUEST['act'])&&$_REQUEST['act']=='submit') {
	$img = $_FILES['img'];
	$file = $img['tmp_name'];
	$name = 'img-' . date("YmdHis") . '.png';
	$newimages = "./upload/images/{$name}";
	$res = move_uploaded_file($file, $newimages);

	//添加文字水印
	$stamp = imagecreatetruecolor(100, 70);
	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);

	$im = imagecreatefrompng($newimages);
	imagestring($stamp, 5, 20, 20, 'libGD', 0x0000FF);
	imagestring($stamp, 3, 20, 40, '(c) 2007-9', 0x0000FF);

	$marge_r = 10;
	$marge_b = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_r, imagesy($im) - $sy - $marge_b, 0, 0, imagesx($stamp), imagesy($stamp), 50);

	imagepng($im, 'photo_stamp.png');
	imagedestroy($im);

	//添加图片水印
	$stamp = imagecreatefrompng('./log.png');
	$im = imagecreatefrompng($newimages);

	$marge_r = 10;
	$marge_b = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	imagecopy($im, $stamp, imagesx($im) - $sx - $marge_r, imagesy($im) - $sy - $marge_b, 0, 0, imagesx($stamp), imagesy($stamp));
	
	header('Content-type: image/png');
	imagepng($im,'newwithlog.png');
	imagedestroy($im);
	var_dump($res);
	exit();
}
?>
<script type="text/javascript">
	function uploads() {
		document.getElementById('form').submit();
	}
</script>
<form action="#" method="post" enctype="multipart/form-data" id="form">
<input type="file" name="img" id="upload" onchange="uploads()"/>
<input type="hidden" name="act"  value="submit">
</form>
