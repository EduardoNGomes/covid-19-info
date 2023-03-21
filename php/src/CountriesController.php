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
        date_default_timezone_set('America/Sao_Paulo');
        $date = date("d-m-Y");
        $hours = date('G:i:s');

        $responseGetCountry = $this->gateway->getCountryInfo($name);
        if ($responseGetCountry == false) {
          $dataToCreate = array($name, 1, $date, $hours);
          // var_dump($data);
          $responseCreated = $this->gateway->create($dataToCreate);
          echo json_encode($responseCreated);
        } else {
          $dateToUpdate = array($date, $hours, $responseGetCountry['access'] + 1, $name);

          $responseToUpdated =  $this->gateway->update($dateToUpdate);
          echo json_encode($responseToUpdated);
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
