# Covid-Information-App

### Deploy Project
- [Covid-Information-App](https://i.imgur.com/Zt20bxj.jpg)
 <h1 align="center">
  <img alt="Covid-Information-App" src="https://i.imgur.com/4wer0dr.png" />
</h1>

## Descricao do projeto | Project description

<p align="left">Este projeto foi desenvolvido como um desafio tecnico</p>
<p align="left">This project was developed as a technical challenge</p>

### Funcionalidades | Features

- [x] Consumo de API externa 
- [x] Manipulacao de DOM
- [x] RESPONSIVE

### 🛠 Tecnologias
As seguintes tecnologias foram utilizadas para desenvolver este site | The following tools were used in building the project

- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [CSS](https://www.css3.com/)
- [JS](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
- [PHP](https://www.php.net/)

### Como utilizar | How to use

1. Instalar e configurar o XAMPP em seu computador, tutorial em [WINDOWS](https://www.youtube.com/watch?v=0Y9OZ0vc1SU&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=12) | [MAC OS](https://www.youtube.com/watch?v=bUqOgDrcsm4&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=14) | [LINUX](https://www.youtube.com/watch?v=aUN0j5Q9quQ&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=13)
2. Dentro da pasta htdocs criar uma pasta com o nome de <strong>selecao</strong>
3. Dentro da pasta <strong>selecao</strong> fazer o clone deste projeto
4. Criar novo banco de dados no phpMyAdmin 
5. Dentro desse banco de dados criar uma tabela com esta query:``` SQL CREATE TABLE `NOME_DO_SEU_BANCO`.`countries` (`name` TEXT NOT NULL , `id` INT NOT NULL AUTO_INCREMENT , `created_at` TEXT NOT NULL , `updated_at` TEXT NOT NULL , `hour` TEXT NOT NULL , `access` INT NOT NULL , PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB;```
6. Dentro do arquivo `index.php` na inicializacao do DB e necessario passar suas informacoes por parametro da seguinte maneira,```
 (Nome do host, nome do banco, username, password) ``` 
- nome do host = localhost 
- nome do banco que voce criou 
- username e password, sao informacoes que voce encontra na secao `Authentication Type`, dentro do arquivo config.inc.php, dentro da pasta phpmyadmin, dentro de lampp 



### Author

- Eduardo Nascimento Gomes

### Contact

- [LinkedIn](https://www.linkedin.com/in/eduardo-gomes-220610227/)
- Eduardo_n_gomes.dev@hotmail.com
