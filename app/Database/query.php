<?php

$db = db_connect();
$db->query('YOUR QUERY HERE');

$query = $db->query('SELECT * FROM solicitante');

$query->getNumRows();

$db     =\Config\Database::connect();
$builder=$db->table('datos');

