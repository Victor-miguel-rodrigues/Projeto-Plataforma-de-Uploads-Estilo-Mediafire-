
# Projeto: Plataforma de Uploads (Estilo Mediafire)

## Descrição Geral
Este projeto é uma aplicação web que simula funcionalidades semelhantes ao Mediafire.  
Ele permite que usuários façam upload de arquivos, gerenciem seus próprios uploads e tenham controle sobre exclusões (soft delete).

O sistema será desenvolvido em etapas, começando em PHP Procedural, depois migrando para **PHP Orientado a Objetos (POO)**, seguido da adoção de **padrões de projeto** e por fim reimplementado em **Laravel** com melhorias no **frontend (CSS)**.

---

## Tecnologias Usadas
- **PHP 8+**
- **MySQL (MariaDB)**
- **Apache (XAMPP ou LAMP)**
- **HTML5 e CSS3**
- **Laravel (fase final)**
- **Composer (dependências)**

---

## Estrutura do Projeto (Fase Procedural)
```
/projeto_uploads
│── /uploads               # Pasta com arquivos enviados
│── /config                # Configurações do DB
│── /views                 # HTMLs e templates
│── index.php              # Página inicial
│── upload.php             # Upload de arquivos
│── listagem.php           # Listar arquivos do usuário
│── excluir.php            # Soft delete (ativo = false)
│── login.php              # Login de usuários
│── registrar.php          # Cadastro de usuários
```

---

## Banco de Dados

### Tabela `usuarios`
| Campo         | Tipo         | Descrição                  |
|---------------|-------------|----------------------------|
| id            | INT (PK)    | Identificador único        |
| nome          | VARCHAR(100)| Nome do usuário            |
| email         | VARCHAR(150)| E-mail único               |
| senha         | VARCHAR(255)| Senha criptografada (hash) |
| criado_em     | TIMESTAMP   | Data de criação            |

### Tabela `arquivos`
| Campo          | Tipo          | Descrição                           |
|----------------|--------------|-------------------------------------|
| id             | INT (PK)     | Identificador único do arquivo      |
| id_usuario     | INT (FK)     | Relacionado ao usuário              |
| nome_original  | VARCHAR(255) | Nome original do arquivo            |
| nome_unico     | VARCHAR(255) | Nome salvo no servidor              |
| caminho        | VARCHAR(255) | Caminho do arquivo no servidor      |
| extensao       | VARCHAR(10)  | Extensão do arquivo                 |
| tamanho        | INT          | Tamanho em bytes                    |
| ativo          | BOOLEAN      | Soft delete (true = ativo)          |
| criado_em      | TIMESTAMP    | Data de upload                      |

---

## Funcionalidades (Fase Procedural)
- Cadastro de usuários
- Login de usuários
- Upload de arquivos
- Listagem de arquivos por usuário logado
- Exclusão lógica (soft delete)
- Reativação de arquivos excluídos

---

## Mudanças para POO
1. Criar classes para manipulação de **Usuários**, **Arquivos**, **Sessão** e **Banco de Dados**.
2. Utilizar **autoloader (Composer)** para carregar classes automaticamente.
3. Melhorar segurança com **Prepared Statements** e **validação de inputs**.
4. Separar responsabilidades (MVC simplificado).

---

## Migração para Laravel
- Implementação em **MVC** completo.
- Autenticação via **Laravel Breeze ou Jetstream**.
- Upload de arquivos usando **Storage** do Laravel.
- Exclusão lógica com **SoftDeletes** (Eloquent).
- Relacionamentos entre modelos `User` e `File`.
- Rotas protegidas com **Middleware Auth**.

---

## Melhorias de CSS
- Layout semelhante ao **Mediafire** (interface moderna e responsiva).
- Uso de **Bootstrap ou Tailwind CSS**.
- Sistema de cards para exibir arquivos.
- Botões estilizados para ações (upload, excluir, restaurar).

---

## Roadmap
1. Criar versão em **PHP Procedural** (conclusão funcional mínima).  
2. Migrar para **POO** com classes organizadas.  
3. Adicionar **padrões de projeto (DAO, Singleton, MVC simplificado)**.  
4. Migrar para **Laravel**.  
5. Melhorar **frontend com CSS/Tailwind**.  

---

## Inspiração
O sistema é inspirado no **Mediafire**, mas com foco em aprendizado prático de PHP, boas práticas e evolução para Laravel.
