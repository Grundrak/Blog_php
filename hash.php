<?php
$password = '1234abcde';
function hashPassword($password) {
    return hash('sha256', $password);
}

echo hashPassword($password);

?>