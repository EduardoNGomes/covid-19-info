<?php
class CountriesGateway
{

  private PDO $conn;

  public function __construct(Database $database)
  {
    $this->conn = $database->getConnection();
  }

  public function getCountryInfo(string $name): bool | array
  {
    $sql = "SELECT *
            FROM countries WHERE name = :name";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }

  public function create(array $data)
  {
    $sql = "INSERT INTO countries (name, access)
            VALUES (:name, :access)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":name", $data[0], PDO::PARAM_STR);
    $stmt->bindValue(":access", $data[1], PDO::PARAM_INT);

    $stmt->execute();
    return $this->conn->lastInsertId();
  }

  public function update(array $data)
  {
  }
}
