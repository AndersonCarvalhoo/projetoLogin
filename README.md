# Requisitos do Ambiente

Antes de iniciar a configuração, certifique-se de que possui os seguintes softwares instalados:

1.1. Sistema Operacional
- Windows 10 ou 11 (caso use Linux ou Mac, adapte os comandos conforme necessário).

1.2. Softwares Necessários
- XAMPP (PHP e Apache)
- PostgreSQL (Banco de Dados)
- PgAdmin (Interface Gráfica para PostgreSQL)
- Editor de Código (VS Code, Sublime Text ou PHPStorm)

### 2. Criando e Configurando o Banco de Dados
- Abra o pgAdmin e conecte-se ao PostgreSQL com o usuário configurado.
- Crie seu DATABASE.
- Dê um nome ao banco (exemplo: sistema_login) e clique em Save.
- Acesse a aba Query Tool e execute o seguinte SQL para criar a tabela de usuários:
```sql
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha TEXT NOT NULL,
    token_persistente TEXT,
    ativo BOOLEAN DEFAULT FALSE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Roteiro para Execução do MODELO2
### 3. Criando a Estrutura do Projeto
- Crie uma pasta para o projeto (exemplo: C:\xampp\htdocs\projetoLogin).
- Adicione os arquivos do modelo 2 nessa pasta.
- Abra a pasta no VS Code ou outro editor de sua preferência.

### 4. Configurando banco de dados no PHP
- Altere os dados exemplos presentes no repositório para os dados do seu BD.
```php
$host = "localhost";
$port = "5432";
$dbname = "sistema_login";
$user = "seu_usuario";
$password = "sua_senha";
```

### 5. Testando o Sistema
- Abra o XAMPP e inicie o Apache.
- No navegador, acesse http://localhost/sistema_login/index.php. (lembre-se de alterar "sistema_login" para o nome da pasta que você criou)

## Roteiro para Execução do MODELO1
Antes de iniciar, certifique-se de que seu ambiente está pronto:
- Node.js instalado (recomendado: última versão LTS) Baixar aqui
- Gerenciador de pacotes npm ou yarn (o npm é instalado automaticamente com o Node.js)

### 1. Criando a Estrutura do Projeto PHP
- Crie uma pasta para o projeto (exemplo: C:\xampp\htdocs\loginbackend).
- Adicione os arquivos do modelo 1 nessa pasta.
- Abra a pasta no VS Code ou outro editor de sua preferência.
- Abra o XAMPP e inicie o Apache.

### 2. Configurando banco de dados no PHP
- Altere os dados exemplos presentes no repositório para os dados do seu BD.
```php
$host = "localhost";
$port = "5432";
$dbname = "sistema_login";
$user = "seu_usuario";
$password = "sua_senha";
```
### 3. Configurando a API do PHP
- No arquivo login.php, insira a URL do seu frontend web.
```php
header('Access-Control-Allow-Origin: http://localhost:5173');
```
### 3. Instalando depêndencias do front
- No modelo 1 abra a pasta projetoLogin que contém o front
- Execute no terminal o seguinte trecho
```cmd
npm install
```
### 4. Executar o ambiente
- Execute no terminal o seguinte trecho
```
npm run dev
```

### 5. Concluído
Agora seu ambiente do Modelo 1 está devidamente configurado e inicializado. (lembre-se de alterar a URL da api do PHP presente no componente Login.jsx)



