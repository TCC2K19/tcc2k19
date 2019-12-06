# ExpoCANP Solution

A ExpoCANP é uma semana acadêmica em que alunos do IFRJ Campus Pinheiral participam de palestras, minicursos, workshops e outros eventos sobre diferentes áreas do conhecimento.
O projeto visa desenvolver um sistema para registrar e controlar esses eventos, a fim de facilitar o acesso dos alunos para conhecer o dia, hora e local em que tal evento ocorrerá, bem como conhecer o número de vagas e para quais específicos público este evento está ligado.

### Como Realizar Deploy da Aplicação

* Criar o Banco de Dados utilizando [Script](expoCANP.sql) disponibilizado no repositório.
* Configurando o .env, criando caso o mesmo não exista.
* Realizar as Migrations
```
php artisan migrate
```
* Rodar as Seeds das Tabelas
```
php artisan db:seed
```
*Testar a Aplicação