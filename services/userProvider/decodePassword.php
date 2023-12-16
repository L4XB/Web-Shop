<?php
function hashPassword($password)
{
    $hashedPassword = hash('sha512', $password);
    return $hashedPassword;
}
?>