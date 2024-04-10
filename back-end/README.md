# Fullstack Challenge - Onfly 20231205

## Tecnologias e Frameworks
    - Laravel
    - Vue.js
    - Quasar
    - MySQL

## Instruções para Utilização do Backend
<br />
Descrição: API para Gestão de Despesas, teste prático processo seletivo da Onfly.

Realize o clone do repositório.
Logo após, a primeira configuração à ser realizada é a criação do arquivo .env, pois nele serão setadas as variáveis do Banco de Dados MySQL e envio de E-mail via SMTP, o arquivo .env.example demonstra como devem ser realizadas as configurações.

Em seguida, certifique-se que você tenha o PHP 8.0+ e o Composer instalados.

Após isso, execute o seguinte comando na raiz do projeto back-end para instalar suas dependências
<br />
```bash
composer install
```
Execute o comando abaixo para estruturar o Banco de Dados:
```bash
php artisan migrate
```
O comando abaixo irá gerar as Keys que serão utilizadas na autenticação da API Despesas:
```bash
php artisan passport:install
```
Com isso, basta executar o seguinte comando e a API deve funcionar perfeitamente:
<br />
```bash
php artisan serve
```
<br />
Segue o link para a documentação da API:
https://documenter.getpostman.com/view/13643890/2sA3BgAFct

## Instruções para Utilização do Frontend
<br />
Descrição: Sistema para gestão dos usuários da API, teste prático do processo seletivo da Onfly.

Certifique-se de ter a versão mais recente do Node.js instalada.

Após isso, execute o seguinte comando na raiz do projeto front-end para instalar suas dependências
<br />
```bash
npm install
```
Após a instalação execute o comando abaixo para rodar o projeto:
<br />
```bash
quasar dev
```
## Diário de Bordo

- Após inicializar o projeto, comecei pela estruturação do Banco de Dados MySQL através das migrations do laravel.

- Criação das Rotas, Controllers e Models da API.

- Fiz a validação da API com o Form Request para implementar as regras de preenchimento dos campos da API.

- Utilizei o API Resources para estruturar o retorno das rotas.

- Com a utilização do API Resource Routes realizei a configuração das rotas de forma rápida e eficiente.

- Foram criados os primeiros testes unitários como intuito de mapear possíveis erros que os endpoists da API poderiam apresentar.

- Através das policies criei as restrições no CRUD Despesas, assim cada usuário só terá acesso as suas despesas.

- Utilizando as Notifications desenvolvi o envio da confirmação por e-mail ao usuário sempre que uma nova despesa for cadastrada.

- Com a API concluida iniciei a criação da tela de gestão de usuários que utiliza a API, onde primeiramente desenvolvi a configuração das rotas através do axios, fazendo a listagem dos usuários e já criando a deleção deles e em seguida criei os forms para inserção e edição das informações dos usuário.

>  This is a challenge by [Coodesh](https://coodesh.com/)
