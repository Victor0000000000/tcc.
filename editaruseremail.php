<?php
include("valida_session_perfil.php");
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod = $_POST['cod'];
    $email = $_POST['email'];

    // Verifique se o e-mail foi fornecido e não está vazio
    if (!empty($email)) {
        // Use consultas preparadas para evitar injeção de SQL
        $sql = "UPDATE usuarios SET email = ? WHERE cod = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Associe os parâmetros
            mysqli_stmt_bind_param($stmt, "si", $email, $cod);

            // Execute a consulta preparada
            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // E-mail do usuário atualizado com sucesso
                    header("Location: perfil.php");
                    exit;
                } else {
                    echo "<script>alert('Nenhuma alteração foi feita.'); window.location='perfil.php';</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Houve algum erro ao atualizar o e-mail.'); window.location='perfil.php';</script>";
            }

            // Feche a consulta preparada
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Houve algum erro.'); window.location='perfil.php';</script>";
        }
    } else {
        echo "<script>alert('Nenhum e-mail foi fornecido.'); window.location='perfil.php';</script>";
    }
}
?>