<?php

require_once 'includes/config.php';

$userid = 5;

$result = $mysql->query("select * from users where user_id = $userid");

var_dump($result->fetch_all());