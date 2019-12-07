# ExpoCANP Solution

A ExpoCANP é uma semana acadêmica em que alunos do IFRJ Campus Pinheiral participam de palestras, minicursos, workshops e outros eventos sobre diferentes áreas do conhecimento.
O projeto visa desenvolver um sistema para registrar e controlar esses eventos, a fim de facilitar o acesso dos alunos para conhecer o dia, hora e local em que tal evento ocorrerá, bem como conhecer o número de vagas e para quais específicos público este evento está ligado.

### Pré-Requisitos

* PHP 7
* MySQL
* Composer

OBS: Pode utilizar feramentas facilitadoras de instalação de servidores de PHP e MySQL como o XAMPP, porém continua sendo necessária a instalação do Composer.

### Como realizar deploy da aplicação

* Fazer o donwload dos arquivos da branch: [Master](https://github.com/felipedavi/expocanp-solution/archive/master.zip)
* Descompactar o arquivo que foi baixado
> Rodar todos comandos dentro da pasta raiz do projeto
* Instalar dependecias do composer :
```
composer install
```
* Criar o arquivo .env:
```
copy ".env.example" ".env";
```
* Gerar a chave da aplicação no .env:
```
php artisan key:generate
```
* Criar o banco de dados utilizando [Script](expoCANP.sql) disponibilizado no repositório.
* Configurando o .env, criando caso o mesmo não exista.
* Realizar as migrations:
```
php artisan migrate
```
* Rodar as seeds das tabelas:
```
php artisan db:seed
```
* Testar a aplicação
