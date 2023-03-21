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
    $sql = "INSERT INTO countries (name, access,created_at,updated_at,hour)
            VALUES (:name, :access,:created_at,:updated_at,:hour)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":name", $data[0], PDO::PARAM_STR);
    $stmt->bindValue(":access", $data[1], PDO::PARAM_INT);
    $stmt->bindValue(":created_at", $data[2], PDO::PARAM_STR);
    $stmt->bindValue(":updated_at", $data[2], PDO::PARAM_STR);
    $stmt->bindValue(":hour", $data[3], PDO::PARAM_STR);


    $stmt->execute();
    return $this->conn->lastInsertId();
  }

  public function update(array $new)
  {
    $sql = "UPDATE countries 
            SET updated_at = :updated_at, access = :access, hour = :hour
            WHERE name= :name";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":updated_at", $new[0], PDO::PARAM_STR);
    $stmt->bindValue(":hour", $new[1], PDO::PARAM_STR);
    $stmt->bindValue(":access", $new[2], PDO::PARAM_INT);
    $stmt->bindValue(":name", $new[3], PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->rowCount();
  }
}
