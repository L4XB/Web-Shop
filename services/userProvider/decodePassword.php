<?php
function hashPassword($password)
{
    $hashedPassword = hash('sha256', $password);
    return $hashedPassword;
}
?>