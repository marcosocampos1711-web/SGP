<?php
// 1. Configurações do Transaction Pooler (Extraídas do painel Supabase > Settings > Database)
$host     = 'fofiwziwsabcxflguqva.supabase.co';
$port     = '6543'; 
$dbname   = 'postgres';
$user     = 'postgres';
$password = 'CEI/CFAP/SGP';
$charset = 'utf8mb4';

$dsn = "pgsql:host=$host;port=$port;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Conectado ao Supabase com sucesso!";
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
