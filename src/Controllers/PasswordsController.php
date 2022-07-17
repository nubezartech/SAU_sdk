<?php
namespace SAU_sdk\Controllers;

class PasswordsController
{
    const SALT = $_ENV["PASSWORD_GENERATOR_SALT"];
    public static function hash($password)
    {
        return hash('sha512', self::SALT . $password);
    }
    public static function verify($password, $hash)
    {
        return ($hash == self::hash($password));
    }
}

/*
// Crear la contraseña:
$hash = PasswordsController::hash('micontraseña');
// Comprobar la contraseña introducida
if (PasswordsController::verify('micontraseña', $hash)) {
    echo 'Contraseña correcta!\n';
} else {
    echo "Contraseña incorrecta!\n";
}
*/