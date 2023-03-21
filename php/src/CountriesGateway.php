<?php
class CountriesGateway
{

  private PDO $conn;

  public function __construct(Database $database)
  {
    $this->conn = $database->getConnection();
  }

  public function getCountryInfo($name)
  {
    $sql = "SELECT *
            FROM countries WHERE name = . $name";
  }

  public function create(array $data): string
  {
    $sql = "INSERT INTO countries (name, access)
            VALUES (:name, :access)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":name", $data['name'], PDO::PARAM_STR);
    $stmt->bindValue(":name", $data['access'], PDO::PARAM_INT);

    $stmt->execute();
    return $this->conn->lastInsertId();
  }
}
