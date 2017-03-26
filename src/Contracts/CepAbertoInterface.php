<?php
namespace RobersonFaria\Cepaberto\Contracts;


interface CepAbertoInterface
{
    public function listarPaises();

    public function listarUfs();

    public function listarCidades($uf);

    public function obterEnderecoPorCep($cep);

    public function obterEnderecoPorLogradouro($uf, $cidade, $logradouro=null, $bairro = null);
}