<?php
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'web');
define('DB_PASS', 'web');
define('DB_NAME', 'web');
define('DB_PORT', '3306');

// Email
define('SMTP_SERVER', 'smtp.gmail.com');    // Servidor SMTP
define('SMTP_PORT', 465);     // Puerto
define('SMTP_AUTH', true);
define('SMTP_SECURE', 'ssl');
define('MAIL_USERNAME', 'Web Empresa');  // Nombre completo
define('MAIL_USER', 'iguemar0208@g.educaand.es');      // Nombre de usuario
define('MAIL_PASS', 'nvry kqsb autw vrpr');      // Password bisn pket zggu uiro