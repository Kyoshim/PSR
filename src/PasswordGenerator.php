<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 18/11/14
 * Time: 11:57
 */

namespace Web1\StringGenerator;

class PasswordGenerator
{
    const PASSWORD_EASY     = 0;
    const PASSWORD_MEDIUM   = 1;
    const PASSWORD_HARD     = 2;


    /**
     * @var string
     */
    private static $passwordCharEasy      = 'abcdefghijklmnopqrstuvwxyz';
    /**
     * @var string
     */
    private static $passwordCharMedium    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    /**
     * @var string
     */
    private static $passwordCharHard      = '#!$£*ù%=+-€@éèêàãõôî';
    /**
     * @var int
     */
    private static $passwordDefaultLength = 10;


    /**
     * @param null $number
     * @param int $strength
     * @return string
     * @throws \Exception
     */
    public static function getRandomString($number = null, $strength = self::PASSWORD_MEDIUM)
    {
        if (!in_array($strength, [
            self::PASSWORD_EASY,
            self::PASSWORD_HARD,
            self::PASSWORD_MEDIUM,
        ]))
            throw new \Exception('Bad strength!');

        $length = (is_null($number))
            ? self::$passwordDefaultLength
            : (0 ==(int)$number)
                ? self::$passwordDefaultLength
                :(int)$number;

        switch ($strength) {
            case self::PASSWORD_EASY:
                $char = self::$passwordCharEasy;
                break;
            case self::PASSWORD_MEDIUM:
                $char = self::$passwordCharEasy.self::$passwordCharMedium;
                break;
            case self::PASSWORD_HARD:
                $char = self::$passwordCharEasy.self::$passwordCharMedium.self::$passwordCharHard;
        }

        $password ='';

        for ($i =0; $i < $length; $i++) {
            $password .= substr($char, mt_rand(0,(strlen($char)-1)), 1);
        }

        return $password;

    }

    /*public function random (){
        $str = 'abcdef';
        $shuffled = str_shuffle($str);
        echo $shuffled;
    }*/
} 