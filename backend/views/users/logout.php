<?php
session_start();
session_unset();
session_destroy();
header('Location: /blog-php/backend/views/users/login.php');
exit;