# 🏛️ Projeto Imóveis TCC

Sistema Web para Gestão Imobiliária, desenvolvido como parte do Trabalho de Conclusão de Curso (TCC). Permite o cadastro, autenticação de usuários, e gestão completa de imóveis.

---

## 📌 1. Visão Geral  
Esse projeto centraliza a administração de imóveis para uma imobiliária, com painel restrito para usuários logados, CRUD de imóveis, e segurança básica (hash de senha e controle de sessão).

---

## 🎯 2. Objetivos

**Objetivo Geral**  
Desenvolver uma aplicação web que facilite o gerenciamento de imóveis por parte de uma imobiliária, através de uma interface segura e simples de usar.

**Objetivos Específicos**  
- Autenticação de usuários  
- Criptografia de senhas  
- CRUD completo de imóveis  
- Painel administrativo restrito a usuários autenticados  
- Interface com design moderno e responsivo  

---

## 🧱 3. Metodologia  
O projeto foi implementado em etapas, seguindo modelo incremental: primeiro o protótipo de login, depois a integração com o banco (MySQL), seguido pela implementação de CRUD de imóveis e validações de sessão.

Linguagem de back-end: **PHP**  
Banco de dados: **MySQL**

---

## 🧩 4. Tecnologias Utilizadas

| Camada | Tecnologias |
|---|---|
| Backend | PHP |
| Banco de Dados | MySQL |
| Front-end | HTML5, CSS3, JavaScript, Bootstrap |
| Segurança | `password_hash()`, `password_verify()` |
| Servidor | Apache (XAMPP ou similar) |

---

## 🏗️ 5. Estrutura do Projeto  
O projeto segue uma arquitetura simples:  
- **Telas PHP/HTML** para interface e formulários  
- **Código PHP** para regras de negócio e autenticação  
- **Banco MySQL** para persistência de dados  
- Validação de sessão para garantir acesso seguro ao painel administrativo

---

## 🔐 6. Segurança e Controle de Acesso  
- Criptografia de senha com `password_hash()`  
- Verificação de login com `password_verify()`  
- Controle de sessão via PHP (`$_SESSION`)  
- Redirecionamento para login caso usuário não esteja autenticado  

---

## 🗄️ 7. Banco de Dados  

### Tabela `usuarios`  
| Campo | Tipo | Propósito |
|---|---|---|
| id | INT PK AI | Identificador do usuário |
| nome | VARCHAR(255) | Nome do usuário |
| email | VARCHAR(255) | Login |
| senha | VARCHAR(255) | Hash da senha |

### Tabela `imoveis`  
| Campo | Tipo | Propósito |
|---|---|---|
| id | INT PK AI | Identificador do imóvel |
| titulo | VARCHAR(255) | Título/nome do imóvel |
| endereco | TEXT | Endereço completo |
| preco | DECIMAL | Valor de venda ou locação |
| descricao | TEXT | Descrição detalhada |

---

## 💻 8. Funcionalidades

- Registro e login de usuários (com criptografia de senha)  
- Painel restrito para usuários logados  
- CRUD de imóveis: criar, ler, atualizar e excluir  
- Upload de imagens de imóveis (pasta `uploads/imoveis`)  
- Interface responsiva com Bootstrap  

---

## 🌐 9. Fluxo de Uso

1. Usuário se **cadastra**  
2. Faz **login**  
3. Acessa o **painel**  
4. Realiza operações de **CRUD em imóveis**  
5. Pode fazer **logout**  

Se tentar acessar o painel sem estar logado, é redirecionado para a página de login.

---

## 🧪 10. Testes e Validação  
- Senhas são armazenadas criptografadas  
- Login autenticado funciona corretamente  
- Acesso não autorizado ao painel é bloqueado  
- Operações de CRUD (imóveis) testadas com sucesso  

---

## 🚀 11. Próximos Passos / Possíveis Melhorias  
- Permissões por níveis de usuário (admin, corretor, cliente)  
- Sistema de busca avançada por imóvel  
- Upload de múltiplas imagens por imóvel  
- Dashboard com estatísticas e gráficos  
- Responsividade ainda mais refinada para dispositivos móveis  

---

## 📥 12. Como Executar Localmente

1. Clone o repositório:  
   ```bash
   git clone https://github.com/Kauanguisilva/projeto-imoveis-tcc.git
