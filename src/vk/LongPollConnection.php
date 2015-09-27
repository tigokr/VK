<?php

/**
 * The PHP class for vk.com API and to support OAuth.
 * @author Vlad Pronsky <vladkens@yandex.ru>
 * @license https://raw.github.com/vladkens/vk/master/LICENSE MIT
 */

namespace tigokr\vk;

class LongPollConnection
{

    private $server;
    private $key;
    private $ts;

    private $url;

    public function __construct($server, $key, $ts)
    {
        $this->server = $server;
        $this->key = $key;
        $this->ts = $ts;

        $this->url = "http://" . $this->server . "?act=a_check&key=" . $this->key . "&ts=" . $this->ts . "&wait=25&mode=2";

    }

    public function wait()
    {
        $result = $this->request($this->url);
        return json_decode($result, true);
    }

    private function request($url, $method = 'GET', $postfields = array())
    {
        return Request::request($url, $method, $postfields);
    }

}
