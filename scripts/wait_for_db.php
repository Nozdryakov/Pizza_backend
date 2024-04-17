<?php
$db_host = 'db';
$db_port = '3306';
$db_user = 'root';
$db_password = 'root';
$db_name = 'pizzaV';

$initial_delay = 30;
$attempt_delay = 1;
$max_attempts = 20;

for ($remaining_seconds = $initial_delay; $remaining_seconds > 0; $remaining_seconds--) {
    echo "\033[40;35mОжидание...{$remaining_seconds}\033[0m\n";

    sleep(1);
}

for ($i = 0; $i < $max_attempts; $i++) {
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

    if ($mysqli->connect_errno) {
        echo "\033[40;31mОшибка соединения: " . $mysqli->connect_error . "\033[0m\n";
        sleep($attempt_delay);
    } else {
        echo "\033[40;32mСоединение успешно установлено\033[0m\n";
        break;
    }
}

if ($i === $max_attempts) {
    echo "\033[40;31mНе удалось установить соединение после $max_attempts попыток\033[0m\n";
}

if ($mysqli) {
    $mysqli->close();
}
