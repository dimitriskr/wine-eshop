<?php

const DB_SERVER = 'db';
const DB_USERNAME = 'db';
const DB_PASSWORD = 'db';
const DB_NAME = 'db';

global $mysql;
$mysql = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$mysql || $mysql->connect_errno) {
    die("Error: Could not connect to the database. " . $mysql->connect_error);
}

$mysql->set_charset('utf8mb4');
