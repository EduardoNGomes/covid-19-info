<?php
require_once "/opt/lampp/htdocs/selecao/php/src/utils/calculateInfo.php";

class CountriesController
{
  public function __construct(private CountriesGateway $gateway)
  {
  }
  public function processRequest(string $method, string $name, string $name2 = null): void
  {
    $this->processResourceRequest($method, $name, $name2);
  }

  private function processResourceRequest(string $method, string | null $name, string | null $name2): void
  {
    if ($name == null) {
      $responseLastCountry = $this->gateway->getLastCountry();
      echo json_encode($responseLastCountry);
    } else {

      switch ($name2) {

        case null:
          $responseFetch = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$name");

          date_default_timezone_set('America/Sao_Paulo');
          $date = date("d-m-Y");
          $hours = date('G:i:s');

          $responseGetCountry = $this->gateway->getCountryInfo($name);

          if ($responseGetCountry == false) {
            $dataToCreate = array($name, 1, $date, $hours);
            $responseCreated = $this->gateway->createCountry($dataToCreate);

            $responseLastCountry = $this->gateway->getLastCountry();

            $response = array("dbaResponse" => $responseCreated, "data" => $responseFetch, "lastCountry" => $responseLastCountry);
            echo json_encode($response);
          } else {
            $dateToUpdate = array($date, $hours, $responseGetCountry['access'] + 1, $name);
            $responseUpdated =  $this->gateway->updateCountry($dateToUpdate);

            $responseLastCountry = $this->gateway->getLastCountry();

            $response = array("dbaResponse" => $responseUpdated, "data" => $responseFetch, "lastCountry" => $responseLastCountry);
            echo json_encode($response);
          }

          break;
        default:
          $responseFetch = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$name");
          $responseFetch2 = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$name2");


          $responseFirstCountry = json_decode($responseFetch, true);
          $responseSecondCountry = json_decode($responseFetch2, true);


          $response = calculateInfo($responseFirstCountry, $responseSecondCountry);

          echo json_encode($response);


          break;
      }
    }
  }
}
