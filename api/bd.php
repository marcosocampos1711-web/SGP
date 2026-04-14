<?php
// 1. Configurações do Transaction Pooler (Extraídas do painel Supabase > Settings > Database)
$host     = 'db.fofiwziwsabcxflguqva.supabase.co';
$port     = '5432'; 
$dbname   = 'postgres';
$user     = 'postgres';
$password = 'CEI/CFAP/SGP';

try {
    // 2. DSN com SSL obrigatório para o Supabase
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT            => 10, // Tempo de espera aumentado para evitar timeouts
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

} catch (PDOException $e) {
    // Log interno do erro real para depuração técnica
    error_log("Falha de Conexão Supabase: " . $e->getMessage());
    
    // Resposta genérica para o usuário (evita quebrar o header do auth.php)
    die("Erro técnico: Não foi possível conectar ao banco de dados. Verifique os logs do servidor.");
}
