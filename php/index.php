<?php
// Regra para obedecer tipagem
declare(strict_types=1);

// Carregando todas as clases dentro de SRC
spl_autoload_register(function ($class) {
  require __DIR__ . "/src/$class.php";
});

// Funcao para lidar com erro passando o metodo criado na classe ErrorHandler
set_exception_handler("ErrorHandler::handleException");

// Informa que a resposta sera um JSON
header("Content-Type: application/json; charset=UTF-8");

// API Access = http://localhost/selecao/php/countries/PaisName
$parts = explode("/", $_SERVER["REQUEST_URI"]);
$url = explode("=", $parts[3]);


if ($url[0] != 'countries') {
  http_response_code(404);
  exit;
}

$name = '';
$name2 = '';

if (sizeof($url) == 2) {
  $allCountriesNames = explode("-", $url[1]);
  $name = $allCountriesNames[0];
  $name2 = $allCountriesNames[1] ?? null;
}


$database = new Database("localhost", "countries_db", "root", "");
$gateway = new CountriesGateway($database);

$controller = new CountriesController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $name, $name2);
