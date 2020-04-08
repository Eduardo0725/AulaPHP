<?php

// use Source\Core\Session;

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    return password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return boolean
 */
function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash, PASSWORD_DEFAULT, ["cost" => 10]);
}

/**
 * @return string
 */
function csrf_input($session): string
{
    $session->csrf();
    return "<input type='hidden' name='csrf' value='" . ($session->csrf_token ?? "") . "'/>";
}

/**
 * @param [type] $request
 * @return bool
 */
function csrf_verify($request, $session): bool
{
    if(empty($session->csrf_token) || empty($request['csrf']) || $request['csrf'] != $session->csrf_token){
        return false;
    }
    return true;
}