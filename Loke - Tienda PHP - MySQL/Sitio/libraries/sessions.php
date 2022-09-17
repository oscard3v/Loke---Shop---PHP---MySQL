<?php

/**
 * Retorna el valor de una variable de sesión con la $key proporcionada, y luego elimina esa variable de la sesión.
 * Si no existe, retorna el $default.
 *
 * @param string $key La key de la variable de sesión que se pide.
 * @param mixed|null $default El valor por defecto a retornar si la $key no existe. Por defecto retorna null.
 * @return mixed|null
 */
function sessionGetValue($key, $default = null) {
    if(isset($_SESSION[$key])) {
        $returnValue = $_SESSION[$key];
        unset($_SESSION[$key]);
    } else {
        $returnValue = $default;
    }
    return $returnValue;
}