<?php

ini_set('session.cookie_lifetime', '3600');
ini_set('session.use_only_cookies', 1); // Ensures session ID is not passed through URLs
ini_set('session.cookie_httponly', 1); // Makes the cookie accessible only through the HTTP protocol
ini_set('session.cookie_secure', 1); // Ensures cookies are sent over secure connections only

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy(); 
    header('Location: login.php');
    exit;
}

function debugSession()
{
    echo "Session Status: " . (session_status() == PHP_SESSION_ACTIVE ? "Active" : "Inactive") . "<br>";
    echo "Session Variables: <pre>" . print_r($_SESSION, true) . "</pre>";
}

function getAndClearFlashMessages()
{
    if (isset($_SESSION['flash'])) {
        $messages = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $messages;
    }
    return [];
}

function generateCsrfToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken($token)
{
    if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token) {
        unset($_SESSION['csrf_token']); 
        return true;
    }
    return false;
}