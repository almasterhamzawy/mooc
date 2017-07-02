<?php
class Redirect {

    public static function To($url) {
        if (headers_sent()){
            die('<script>window.location.href="' . $url . '";</script>');
        }else{
            header('Location: ' . $url);
            die();
        }
    }
}
