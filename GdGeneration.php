<?php


class GdGeneration
{
    public function Gd_Generation($name, $score, $point,$quantity)
    {
        header('content-type: image/png');
        $image = imagecreatetruecolor(2480, 3508);

        $backgroundcol = imagecolorallocate($image, 17, 159, 38);
        $textcolor = imagecolorallocate($image, 0, 0, 0);
        imagefill($image, 0, 0, $backgroundcol);
        imagettftext($image, 188.203125, 0, 850, 848, $textcolor, __DIR__."/ARIAL.TTF", 'Diplom');
        imagettftext($image, 127.978125, 0, 988, 1455, $textcolor, __DIR__."/ARIAL.TTF", "$name");
        imagettftext($image, 127.978125, 0, 617, 1884, $textcolor, __DIR__."/ARIAL.TTF", 'You passed our');
        imagettftext($image, 127.978125, 0, 740, 2118, $textcolor, __DIR__."/ARIAL.TTF", 'training test!');
        imagettftext($image, 127.978125, 0, 351, 2858, $textcolor, __DIR__."/ARIAL.TTF", "Correct answers $point of $quantity!");
        imagettftext($image, 127.978125, 0, 746, 3266, $textcolor, __DIR__."/ARIAL.TTF", "Your mark: $score");
        imagepng($image);
        imagedestroy($image);
    }
}