<?php
/**
 * Created by PhpStorm.
 * User: roberson.faria
 * Date: 25/01/16
 * Time: 17:04
 */

namespace Rfweb\Cepaberto\Exceptions;

use Exception;

class CepAbertoException extends Exception
{
    /**
     * Cria a exceção
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    // personaliza a apresentação do objeto como string
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}