<?php
/**
 * Created for vk
 * in extweb.org with love!
 * Artem Dekhtyar mail@artemd.ru
 * 24.09.2015
 */

namespace tigokr\vk;


class Request
{

    static public $agent = 'vk/1.0 (+https://github.com/vladkens/vk))';

    public static function request($url, $method = 'GET', $postfields = array()){
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_USERAGENT => self::$agent,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST, false,
            CURLOPT_POST => ($method == 'POST'),
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_URL => $url
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }



}