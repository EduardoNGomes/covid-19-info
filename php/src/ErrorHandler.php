<?php

// Classe para fazer tratamento de erros
class ErrorHandler
{
  public static function handleException(Throwable $exception): void
  {
    // Retornando o status code de error no servidor 
    http_response_code(500);
    // Retornando um array com code,message,file,line
    echo json_encode([
      "code" => $exception->getCode(),
      "message" => $exception->getMessage(),
      "file" => $exception->getFile(),
      "line" => $exception->getLine()
    ]);
  }
  public static function handleError(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline
  ): bool {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
  }
}
