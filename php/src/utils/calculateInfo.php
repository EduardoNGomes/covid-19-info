<?php
function calculateInfo(array $fistCountry, array $secondCountry)
{
  $confirmedFistCountry = 0;
  $deadFistCountry = 0;
  $percentageDeathFistCountry = 0;

  $confirmedSecondCountry = 0;
  $deadSecondCountry = 0;
  $percentageSecondFistCountry = 0;


  foreach ($fistCountry as $value) {
    $confirmedFistCountry += $value["Confirmados"];
    $deadFistCountry += $value["Mortos"];
  }

  $percentageDeathFistCountry = ($deadFistCountry / $confirmedFistCountry) * 100;


  foreach ($secondCountry as $value) {
    $confirmedSecondCountry += $value["Confirmados"];
    $deadSecondCountry += $value["Mortos"];
  }

  $percentageDeathSecondCountry = ($deadSecondCountry / $confirmedSecondCountry) * 100;

  $response = array("confirmedFistCountry" => $confirmedFistCountry, "deadFistCountry" => $deadFistCountry, "percentageDeathFistCountry" => $percentageDeathFistCountry, "confirmedSecondCountry" => $confirmedSecondCountry, "deadSecondCountry" => $deadSecondCountry, "percentageDeathSecondCountry" => $percentageDeathSecondCountry);

  return $response;
}
