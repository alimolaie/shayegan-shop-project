<?php

namespace App\Lib;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Helper
{



    public static function isValidNationalCode($code)
    {
        return true;
        if (!preg_match('/^[0-9]{10}$/', $code))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($code, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

    public static function isValidFarsiDate(string $date){
        if(trim($date))
            return preg_match('/^[0-9]{4,4}\/[0-9]{2,2}\/[0-9]{2,2}$/', $date);
        return false;
    }

    public static function ConvertGregorianToShamsi($number)
    {

        if ($number >= 1 And $number <= 12) {

            $month = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];


        } else {
            return "";
        }

    }

    public static function convertToEnNumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function convertToEnNumberInputs($inputs = [], $keys = [])
    {

        $_i = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $inputs))
                $_i[$key] = Helper::convertToEnNumber($inputs[$key]);
        }

        return array_merge($inputs, $_i);

    }

    public static function convertToFANumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $convertedPersianNums = str_replace($english, $persian, $string);

        return $convertedPersianNums;
    }

    public static function createCaptcha()
    {

        $image = imagecreate(100, 40);
        $text = '';
        for ($i = 0; $i < 5; $i++) {
            $number = rand(1, 9);
            $text .= $number;
            $bdColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
            $tColor = imagecolorallocate($image, rand(100, 255), rand(100, 255), rand(110, 255));
            imagefttext($image, rand(18, 25), rand(-15, 15), $i * 18 + 4, rand(20, 30), $tColor, "./font/BFarnaz.ttf", $number);
        }

        Session::put('Captcha', $text);
        Session::save();
        header("Content-Type: image/jpeg");
        imagejpeg($image);
        imagedestroy($image);
    }

    public static function SeoFix($string)
    {
        $fixingString = $string;
        $fixingString = preg_replace("/[^a-z0-9.]+/i", "_", $fixingString);
        $fixingString = trim($fixingString, "_");
        $fixingString = trim($fixingString);

        return $fixingString;
    }


    public static function SeoFixFa($string)
    {

        return str_replace(" ", "-", trim($string));
    }

    public static function isValidTimeStamp($timestamp)
    {
        return ((string)(int)$timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Find the position of the Xth occurrence of a substring in a string
     * @param $haystack
     * @param $needle
     * @param $number integer > 0
     * @return int
     */
    public static function strposX($haystack, $needle, $number)
    {
        if ($number == '1') {
            return strpos($haystack, $needle);
        } elseif ($number > '1') {
            return strpos($haystack, $needle, self::strposX($haystack, $needle, $number - 1) + strlen($needle));
        } else {
            return error_log('Error: Value for parameter $number is out of range');
        }
    }




    public static function isMobile($code)
    {
        $validation = Validator::make(["mobile" => $code], [
            'mobile' => array('regex:/(^09(\d+)?$)/u', 'max:11', 'min:11'),
        ]);

        return !$validation->fails();
    }


    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param  array  $search
     * @param  array  $values
     * @return static
     */
    public static function updateOrCreate($model, array $search, array $values = array())
    {
        $instance = $model::firstOrCreate($search, $values);
        $instance->fill($values)->save();

        return $instance;
    }


//    "FCAcEA0HBAoRGyALBQIeCAcaDxYWEQQPBxcXHgAFDgY=", "aB4gHxkwBQkKCxoRGBkaFA=="
    public static function encryptFileString($key, $encIV, $string)
    {
        $iv = base64_decode($encIV);
        $encrypter = 'aes-256-cbc';
        return openssl_encrypt($string, $encrypter, $key, 0, $iv);

    }

    public static function decryptFileString($key, $encIV, $string)
    {
        $iv = base64_decode($encIV);
        $encrypter = 'aes-256-cbc';
        return openssl_decrypt($string, $encrypter, $key, 0, $iv);

    }


}
