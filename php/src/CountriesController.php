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
        $response = $this->gateway->getCountryInfo($name);
        if ($response == false) {
          $data = array($name, 1);
          // var_dump($data);
          $responseCreated = $this->gateway->create($data);
          echo json_encode($responseCreated);
        } else {

          echo json_encode($response);
        }
        // $content = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$name");
        // echo $content;
        break;
      default:
        echo "Temos dois paises";
        break;
    }
  }
}
