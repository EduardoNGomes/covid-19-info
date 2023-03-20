<?php

class CountriesController
{
  public function processRequest(string $method, string $name): void
  {
    $this->processResourceRequest($method, $name);
  }

  private function processResourceRequest(string $method, string $name): void
  {
    switch ($method) {
      case 'GET':
        echo "Method: $method, Name: $name";
        break;
    }
  }
}
