<?php
// Regra para obedecer tipagem
declare(strict_types=1);

// Carregando todas as clases dentro de SRC
spl_autoload_register(function ($class) {
  require __DIR__ . "/src/$class.php";
});

// Informa que a resposta sera um JSON
header("Content-Type: application/json; charset=UTF-8");

// API Access = http://localhost/selecao/php/countries/PaisName
$parts = explode("/", $_SERVER["REQUEST_URI"]);


if ($parts[3] != 'countries') {
  http_response_code(404);
  exit;
}
$name = $parts[4];

$database = new Database("localhost", "countries_db", "root", "");
$database->getConnection();

$controller = new CountriesController();

$controller->processRequest($_SERVER["REQUEST_METHOD"], $name);
