<?php
// Conecta com o banco de dados
require "conexao.php";

// Dados são salvos pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulário de cadastro de usuário
    $nome = $_POST['nome_aluno'];
    $email = $_POST['email_aluno'];
    $senha = $_POST['senha_aluno'];
    $data_nasc = $_POST['data_nasc'];

    // Monta a consulta SQL com a coluna de ID excluída, pois é auto incrementada
    $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('$nome', '$email', '$senha', '$data_nasc')";

    // Executa a consulta SQL
    if (mysqli_query($conn, $sql)) {
        // A inserção foi bem-sucedida
        echo "<script type='text/javascript'>alert('Usuário cadastrado!');</script>";
        header('Location: telainicial.php');
        exit; // Encerre o script para evitar execução adicional
    } else {
        // Se a inserção falhar, você pode lidar com o erro aqui
        echo "Erro ao inserir dados no banco de dados: " . mysqli_error($conn);
    }
}
?>