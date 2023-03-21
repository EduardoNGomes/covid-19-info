<?php

class CountriesController
{
  public function __construct(private CountriesGateway $gateway)
  {
  }
  public function processRequest(string $method, string $name, string $name2 = null): void
  {
    $this->processResourceRequest($method, $name, $name2);
  }

  private function processResourceRequest(string $method, string $name, string $name2 = null): void
  {
    switch ($name2) {
      case null:
        echo json_encode($this->gateway->getCountryInfo($name));
        $content = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$name");
        // echo $content;
        break;
      default:
        echo "Temos dois paises";
        break;
    }
  }
}
