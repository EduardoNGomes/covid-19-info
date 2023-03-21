<?php

class Database
{
  public function __construct(private string $host, private string $name, private string $user, private string $password)
  {
  }

  public function getConnection(): PDO
  {
    $dns = "mysql:host={$this->host}; dbname={$this->name}; charset=utf8;";
    return new PDO(
      $dns,
      $this->user,
      $this->password,
      // converter boolean to number
      [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_STRINGIFY_FETCHES => false]
    );
  }
}
