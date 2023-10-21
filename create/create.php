<?php

use Core\dbConnection;

require $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
 
/**
 * Класс создания таблиц
 */
class Create extends dbConnection
{
    public object $mysql;

    public function __construct()
    {
        $this->mysql = (new dbConnection);
    }

    public function createTable($name, $query)
    {
        $this->mysql::sql("CREATE TABLE IF NOT EXISTS " . $name . " (" . $query . ")");
        echo "Таблица '$name' создана или уже существовала<br>";
    }
}

$name = 'applications';

$sql = ' id INT(32) AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
number VARCHAR(255) NOT NULL,
mail VARCHAR(255) NOT NULL,
city VARCHAR(255) NOT NULL,
date DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)';

(new Create)->createTable($name, $sql);
