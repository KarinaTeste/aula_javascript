<?php

/*try {
    $conn = new pdo('postgresql:host=local;dbname=tasks', 'root', '');
    echo "Conectou";
}catch (PDOException $e) {
    echo "Erro as se conectar: Erro " . $e->getMessage();
}
*/


try {
    // Ajuste o host, nome do banco de dados, usuário e senha conforme sua configuração
    $host = 'localhost';  // Ou IP do servidor
    $db   = 'tasks';      // Nome do banco de dados
    $user = 'root';       // Nome do usuário
    $pass = '';           // Senha (em branco ou altere conforme necessário)

    // Conexão com o banco de dados PostgreSQL usando PDO
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    
    // Definindo o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexão bem-sucedida ao banco de dados!";
} catch (PDOException $e) {
    // Exibe a mensagem de erro caso não consiga conectar
    echo "Erro ao conectar: " . $e->getMessage();
}
