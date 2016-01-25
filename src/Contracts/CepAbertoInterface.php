<?php
/**
 * Created by PhpStorm.
 * User: roberson.faria
 * Date: 25/01/16
 * Time: 17:01
 */

namespace Rfweb\Cepaberto\Contracts;


interface CepAbertoInterface
{
    public function paises();

    public function ufs();

    public function endereco($cep);
}