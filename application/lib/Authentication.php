<?php

class Auth
{
    public static function verifyLoggedIn()
    {
        // initialize the session
        Session::init();

        // if user is still not logged in, then destroy session, handle user as "not logged in" and
        // redirect user to login page
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            Session::destroy();
            header('location: ' . BASE_URL . 'login');
        }
    }

    public static function verifyNotLoggedIn()
    {
        // initialize the session
        Session::init();

        // if user is already logged in, then redirect to home page
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            header('location: ' . BASE_URL . 'home');
        }
    }
}