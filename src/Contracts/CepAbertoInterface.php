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
    public function listarPaises();

    public function listarUfs();

    public function listarCidades($uf);

    public function obterEnderecoPorCep($cep);

    public function obterEnderecoPorLogradouro($uf, $cidade, $logradouro=null, $bairro = null);
}