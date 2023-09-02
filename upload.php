<?php
include('conexao.php');

$uploaddir = "poster/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (!is_writable($uploaddir)) {
    echo 'O diretório não possui permissão de escrita.';
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Arquivo válido e enviado com sucesso.\n";
        
        $poster = basename($_FILES['userfile']['name']);
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
        $duracao = $_POST['duracao'];
        $ano = $_POST['ano'];
        $video = $_POST['video'];
        $genero = $_POST['genero'];
        $turma = $_POST['turma'];
        $tema = $_POST['tema'];

        $sql = "INSERT INTO curta (titulo, duracao, video, sinopse, tema, genero, ano, turma, poster) VALUES ('$titulo', '$duracao', '$video', '$sinopse', '$tema', '$genero', '$ano', '$turma', '$poster')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Curta Cadastrado!";
            // Você pode redirecionar o usuário ou fornecer um link para voltar à página anterior
        } else {
            echo "Erro ao inserir dados no banco de dados: " . mysqli_error($conn);
        }
    } else {
        echo "Erro ao fazer o upload do arquivo!";
    }
}
?>