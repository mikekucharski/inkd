<?php

class Session
{

    public static function init()
    {
        // start the session only if no session exists
        if (session_id() == '') {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else{
            return null;
        }
    }

    public static function destroy()
    {
        session_destroy();
    }
}