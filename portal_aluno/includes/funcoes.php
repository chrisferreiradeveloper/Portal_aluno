<?php
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function limparTexto($texto) {
    return trim((string) $texto);
}
