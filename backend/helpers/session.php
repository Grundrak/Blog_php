<?php

ini_set('session.cookie_lifetime', '3600');
session_start();

function setFlash($key, $message)
{
    $_SESSION['flash'][$key] = $message;
}

function getFlash($key)
{
    if (isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]); 
        return $message;
    }
    return null;
}

function isLoggedIn()
{
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function logout()
{
    $_SESSION = array(); 
    session_destroy(); 
    header('Location: login.php');
    exit;
}

function debugSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    echo "Session Status: " . (session_status() == PHP_SESSION_ACTIVE ? "Active" : "Inactive") . "<br>";
    echo "Session Variables: <pre>" . print_r($_SESSION, true) . "</pre>";
}

// Function to get and clear flash messages
function getAndClearFlashMessages()
{
    if (isset($_SESSION['flash'])) {
        $messages = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $messages;
    }
    return [];
}
