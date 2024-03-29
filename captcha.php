<?php

session_start();
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 6);
$_SESSION['cap_code'] = $ranStr;
$newImage = imagecreatefromjpeg("cap_bg.jpeg");
$txtColor = imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($newImage);

/*
session_start();

if(isset($_SESSION['captcha']))
{
unset($_SESSION['captcha']);
}
$num_chars=6;//number of characters for captcha image
$characters=array_merge(range(0,9),range('A','Z'),range('a','z'));//creating combination of numbers & alphabets
shuffle($characters);//shuffling the characters
//getting the required random 5 characters
$captcha_text="";
for($i=0;$i<$num_chars;$i++)
{
$captcha_text.=$characters[rand(0,count($characters)-1)];
}

$_SESSION['captcha'] =$captcha_text;// assigning the text into session
//header("Content-type: image/png");// setting the content type as png
$captcha_image=imagecreatetruecolor(140,30);
$captcha_background=imagecolorallocate($captcha_image,225,238,221);//setting captcha background colour
$captcha_text_colour=imagecolorallocate($captcha_image,58,94,47);//setting cpatcha text colour

imagefilledrectangle($captcha_image,0,0,140,29,$captcha_background);//creating the rectangle

$font='arial.ttf';//setting the font path

imagettftext($captcha_image,20,0,11,21,$captcha_text_colour,$font,$captcha_text);
imagepng($captcha_image);
imagedestroy($captcha_image);
*/


/*
class DayyanConfirmImage
{
	private $showLine = true;
	private $applyWave = true;
	private $winHeight = 50;
	private $winWidth = 320;
	
	private $Characters; // random characters
	
	private $Colors =  array (	'0' => '145',
								'1' => '204',
								'2' => '177',
								'3' => '184',
								'4' => '199',
								'5' => '255');

////////////////////////////////////////////////////////////////////////////////
	public function __construct($ConfirmCode)
	{
		$this -> Characters = $ConfirmCode;
	}

////////////////////////////////////////////////////////////////////////////////
	public function ShowImage()
	{
		//detect server operation system
		if ( strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' )//windows detected
			$this -> win();
		else	//linux detected
			$this -> linux();
	}

////////////////////////////////////////////////////////////////////////////////
	private function win()
	{
		////////////////////////////////////
		//background image
		$image = imagecreatetruecolor($this -> winWidth, $this -> winHeight) 
        	or die("<b>" . __FILE__ . "</b><br />" . __LINE__ . " : 
            	" ."Cannot Initialize new GD image stream");
		$bg = imagecolorallocate($image, 255, 255, 255);
		imagefill($image, 10, 10, $bg);

		for ($x=0; $x < $this -> winWidth; $x++)
		{
			for ($y=0; $y < $this -> winHeight; $y++)
			{
				$random = mt_rand(0 , 5);
				$temp_color = imagecolorallocate($image, 
                	$this -> Colors["$random"], 
                	$this -> Colors["$random"], $this -> Colors["$random"]);
				imagesetpixel( $image, $x, $y , $temp_color );
			}
		}

		$char_color = imagecolorallocatealpha($image, 0, 0, 0, 90);

		//Font
		$font = "tahomabd.ttf";
		$font_size = 33;
		////////////////////////////////////
		//Image characters

		$char = "";

		$char = $this -> Characters[0];
		$random_x = mt_rand(10 , 20);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		$char = $this -> Characters[1];
		$random_x = mt_rand(50 , 70);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		$char = $this -> Characters[2];
		$random_x = mt_rand(100 , 120);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		$char = $this -> Characters[3];
		$random_x = mt_rand(150 , 170);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		$char = $this -> Characters[4];
		$random_x = mt_rand(200 , 220);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		$char = $this -> Characters[5];
		$random_x = mt_rand(250 , 270);
		$random_y = mt_rand(35 , 45);
		$random_angle = mt_rand(-20 , 20);
		imagettftext($image, $font_size, $random_angle, 
        	$random_x, $random_y, $char_color, $font, $char);

		////////////////////////////////////
		if ($this -> applyWave)
			$image = $this -> apply_wave($image, $this -> winWidth, 
            	$this -> winHeight);
			
		////////////////////////////////////
		//lines
		if ($this -> showLine)
		{
			for ($i=0; $i<$this->winWidth; $i++ )
			{
				if ($i%10 == 0)
				{
					imageline ( $image, $i, 0, 
                    	$i+10, 50, $char_color );
					imageline ( $image, $i, 0, 
                    	$i-10, 50, $char_color );
				}
			}
		}
			
		////////////////////////////////////
		return imagepng($image);
		imagedestroy($image);
	}

/////////////////////////////////////////////////////////////
	private function linux()
	{
		////////////////////////////////////
		//Background image
		$image = imagecreatetruecolor(150, 50) or 
        	die("<b>" . __FILE__ . "</b><br />" . __LINE__ . " : " 
            	."Cannot Initialize new GD image stream");
		$bg = imagecolorallocate($image, 255, 255, 255);
		imagefill($image, 10, 10, $bg);

		for ($x=0; $x < 150; $x++)
		{
			for ($y=0; $y < 50; $y++)
			{
				$random = mt_rand(0 , 5);
				$temp_color = imagecolorallocate($image, $this -> 
                	Colors["$random"], $this -> Colors["$random"], $this -> 
                    Colors["$random"]);
				imagesetpixel( $image, $x, $y , $temp_color );
			}
		}

		$char_color = imagecolorallocatealpha($image, 0, 0, 0, 60);

		////////////////////////////////////
		//Image Info
		$font = 5;

		////////////////////////////////////
		//Image characters
		$char = $this -> Characters[0];
		$random_x = mt_rand(10 , 20);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		$char = $this -> Characters[1];
		$random_x = mt_rand(30 , 40);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		$char = $this -> Characters[2];
		$random_x = mt_rand(50 , 60);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		$char = $this -> Characters[3];
		$random_x = mt_rand(70 , 80);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		$char = $this -> Characters[4];
		$random_x = mt_rand(90 , 100);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		$char = $this -> Characters[5];
		$random_x = mt_rand(110 , 120);
		$random_y = mt_rand(15,25);
		imagestring($image, $font, $random_x, $random_y, $char, $char_color);

		///////////////////////
		return imagepng($image);
		imagedestroy($image);
	}

///////////////////////////////////////////////////////////
	private function apply_wave($image, $width, $height)
	{		
		$x_period = 10;
		$y_period = 10;
		$y_amplitude = 5;
		$x_amplitude = 5;
		
		$xp = $x_period*rand(1,3);
		$k = rand(0,100);
		for ($a = 0; $a<$width; $a++)
			imagecopy($image, $image, $a-1, sin($k+$a/$xp)*$x_amplitude, 
            	$a, 0, 1, $height);
			
		$yp = $y_period*rand(1,2);
		$k = rand(0,100);
		for ($a = 0; $a<$height; $a++)
			imagecopy($image, $image, sin($k+$a/$yp)*$y_amplitude, 
            	$a-1, 0, $a, $width, 1);
		
		return $image;
	}
}

*/
?>