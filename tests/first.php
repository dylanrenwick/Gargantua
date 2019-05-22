<?php

$config_file = '../application/config/config.' . Environment::get() . '.php';
if (!file_exists($config_file)) {
    copy('../application/config/config.development.php', $config_file);
}