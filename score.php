<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 04.08.17
 * Time: 4:21
 */


class score
{
    public function Test_Score($number)
    {
        switch ($number) {
            case 0 :
                $score = 'F';
                return $score;
                break;

            case 1 :
                $score = 'E';
                return $score;
                break;

            case 2 :
                $score = 'D';
                return $score;
                break;

            case 3 :
                $score = 'B';
                return $score;
                break;

            case 4 :
                $score = 'A';
                return $score;
                break;

            case 5 :
                $score = 'A+';
                return $score;
                break;


        }
    }
}