📘 Projeto Imóveis – TCC

Aplicação completa para gerenciamento de imóveis (CRUD), incluindo autenticação de usuários, painel administrativo e operações básicas de um sistema imobiliário.

📑 Sumário

Visão Geral

Tecnologias Utilizadas

Funcionalidades

Requisitos

Como Rodar o Projeto

Scripts SQL do Banco de Dados

Estrutura de Pastas

Configuração do Banco de Dados

Screenshots (opcional)

Autor

Licença

📌 Visão Geral

Este projeto foi desenvolvido como TCC com o objetivo de criar uma plataforma simples e funcional para gerenciamento de imóveis, incluindo cadastro, edição, exclusão e listagem, além de controle de usuários com autenticação de login.

🛠 Tecnologias Utilizadas

PHP 8+

MySQL

XAMPP (Apache + MySQL)

HTML5

CSS3

JavaScript

Bootstrap 5

⭐ Funcionalidades

Login e autenticação de usuários

Cadastro de imóveis

Listagem com filtros

Edição de imóveis

Exclusão de imóveis

Cadastro de usuários

Dashboard administrativa

Proteção de rotas com session_start()

Sidebar com navegação

📦 Requisitos

PHP 8+

MySQL 5.7+ / MariaDB

XAMPP (recomendado)

Navegador moderno

Git (opcional)

🚀 Como Rodar o Projeto
1️⃣ Clone o repositório
git clone https://github.com/Kauanguisilva/projeto-imoveis-tcc

2️⃣ Mova o projeto para a pasta do servidor
C:/xampp/htdocs/projeto-imoveis-tcc

3️⃣ Inicie o XAMPP

Ative Apache

Ative MySQL

4️⃣ Crie o banco de dados

No phpMyAdmin, crie o banco:

imobiliaria_db

5️⃣ Importe os scripts SQL (abaixo)
6️⃣ Configure a conexão

Arquivo: config.php
Ajuste conforme seu ambiente:

<?php
$usuario = "root";
$senha = "";
$database = "imobiliaria_db";
$host = "localhost";

$conn = new mysqli($host, $usuario, $senha, $database);

if($conn->connect_error){
    die("Falha ao conectar: " . $conn->connect_error);
}
?>

7️⃣ Acesse o sistema:
http://localhost/projeto-imoveis-tcc

🗄 Scripts SQL do Banco de Dados
🔹 Tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

🔹 Inserir usuário administrador
INSERT INTO usuarios (nome, email, senha)
VALUES ('Administrador', 'admin@admin.com', MD5('admin123'));

🔹 Tabela de imóveis
CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT,
    endereco VARCHAR(255),
    preco DECIMAL(10,2),
    tipo VARCHAR(50),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

📂 Estrutura de Pastas
projeto-imoveis-tcc/
│
├── config.php
├── index.php
├── login.php
├── logout.php
│
├── painel/
│   ├── dashboard.php
│   ├── cadastrar-imovel.php
│   ├── editar-imovel.php
│   ├── excluir-imovel.php
│   ├── listar-imoveis.php
│   ├── usuarios/
│       ├── cadastrar.php
│       ├── listar.php
│
├── css/
├── js/
├── img/
└── README.md

⚙ Configuração do Banco de Dados

Banco: imobiliaria_db

Charset recomendado: utf8mb4_unicode_ci

Usuário padrão: root

Senha: (vazia) no XAMPP

🖼 Screenshots (opcional)

Adicione aqui suas imagens:

![Dashboard](img/dashboard.png)
![Login](img/login.png)


📄 Licença

Este projeto é livre para uso educacional e não possui licença proprietária.