<?php
include '../db/conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tipo = $_POST['tipo'];
    $tipoNegocio = $_POST['tipoNegocio'];
    $valor = $_POST['valor'];

    // 1) Salva o imóvel primeiro
    $sql = "INSERT INTO imoveis 
            (titulo, descricao, endereco, cidade, estado, tipo, tipoNegocio, valor) 
            VALUES 
            ('$titulo', '$descricao', '$endereco', '$cidade', '$estado', '$tipo', '$tipoNegocio', '$valor')";

    if ($conexao->query($sql) === TRUE) {

        // Pega o ID do imóvel recém cadastrado
        $id_imovel = $conexao->insert_id;

        // 2) Upload de múltiplas imagens
        $pasta = "../uploads/imoveis/";

        foreach ($_FILES['imagens']['name'] as $key => $nomeOriginal) {

            if ($_FILES['imagens']['error'][$key] === 0) {

                $novoNome = uniqid() . "-" . $nomeOriginal;
                $tmp = $_FILES['imagens']['tmp_name'][$key];

                if (move_uploaded_file($tmp, $pasta . $novoNome)) {

                    // Salva no banco cada imagem
                    $sqlImg = "INSERT INTO imagens_imovel (id_imovel, nome_imagem)
                               VALUES ('$id_imovel', '$novoNome')";
                    $conexao->query($sqlImg);
                }
            }
        }

        echo "<script>alert('Imóvel cadastrado com sucesso!'); window.location.href='cadastro_imoveis.php';</script>";

    } else {

        echo "<script>alert('Erro ao cadastrar imóvel!'); history.back();</script>";
    }

} else {
    echo "Acesso inválido!";
}
?>