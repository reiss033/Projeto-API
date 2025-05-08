<?php
$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "<h1>🍽️ Sistema de Restaurante</h1>";

    // Bebidas
    echo "<h2>🍹 Bebidas Disponíveis</h2>";
    $bebidas = $pdo->query("SELECT * FROM bebidas")->fetchAll(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach ($bebidas as $b) {
        echo "<li>{$b['nome']} - R$ {$b['preco']}</li>";
    }
    echo "</ul>";

    // Pedidos
    echo "<h2>📋 Pedidos</h2>";
    $sql = "SELECT pedidos.id, nome_cliente, bebidas.nome AS bebida, quantidade
            FROM pedidos
            JOIN bebidas ON pedidos.bebida_id = bebidas.id";
    $pedidos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    echo "<ul>";
    foreach ($pedidos as $p) {
        echo "<li>Cliente: {$p['nome_cliente']} | Bebida: {$p['bebida']} | Quantidade: {$p['quantidade']}</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "<h1>Erro: " . $e->getMessage() . "</h1>";
}
?>