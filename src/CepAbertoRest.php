<?php
/**
 * Created by PhpStorm.
 * User: roberson.faria
 * Date: 25/01/16
 * Time: 16:57
 */

namespace Rfweb\Cepaberto;

use Illuminate\Routing\Controller;
use Rfweb\Cepaberto\Contracts\CepAbertoInterface;
use Rfweb\Cepaberto\Exceptions\CepAbertoException;
use GuzzleHttp\Client;
use Exception;
use Cache;

class CepAbertoRest extends Controller implements CepAbertoInterface
{
    protected function connect($service,$args = []){
        try {
            $client = new Client();
            $url = config('cepaberto.url-service')[$service] . "?" . http_build_query($args) ;
            $response = $client->request('GET', $url,
                [
                    'headers' => [
                        'Authorization' => 'Token token='.config('cepaberto.token')
                    ]
                ]);
            $content = $response->getBody()->getContents();
            return json_decode($content);
        }catch (Exception $e){
            switch($e->getCode()){
                case 500:
                    throw new CepAbertoException('Erro ao consultar serviço rest do NeoCep.',500);
                    break;
                case 404:
                    throw new CepAbertoException('Parametros incompletos ou serviço não encontrado no NeoCep.',404);
                    break;
                default:
                    throw new CepAbertoException('Erro inesperado ao conectar ao serviço REST do NeoCep. Exception:'.$e->getMessage(),$e->getCode());
                    break;
            }
        }
    }

    public function listarPaises()
    {
        return [
            "BRA" => "Brasil"
        ];
    }

    public function listarUfs($pais = "BRA")
    {
        $ufs = [
            "BRA" => [
                "AC"=>"Acre",
                "AL"=>"Alagoas",
                "AM"=>"Amazonas",
                "AP"=>"Amapá",
                "BA"=>"Bahia",
                "CE"=>"Ceará",
                "DF"=>"Distrito Federal",
                "ES"=>"Espírito Santo",
                "GO"=>"Goiás",
                "MA"=>"Maranhão",
                "MT"=>"Mato Grosso",
                "MS"=>"Mato Grosso do Sul",
                "MG"=>"Minas Gerais",
                "PA"=>"Pará",
                "PB"=>"Paraíba",
                "PR"=>"Paraná",
                "PE"=>"Pernambuco",
                "PI"=>"Piauí",
                "RJ"=>"Rio de Janeiro",
                "RN"=>"Rio Grande do Norte",
                "RO"=>"Rondônia",
                "RS"=>"Rio Grande do Sul",
                "RR"=>"Roraima",
                "SC"=>"Santa Catarina",
                "SE"=>"Sergipe",
                "SP"=>"São Paulo",
                "TO"=>"Tocantins"
            ],
        ];
        return $ufs[$pais];
    }

    public function listarCidades($uf)
    {
        return Cache::remember('cidades'.$uf, config('cepaberto.time-cache'), function() use ($uf) {
            return $this->connect('cities', ['estado' => $uf]);
        });
    }

    public function obterEnderecoPorCep($cep)
    {
        return $this->connect('ceps',['cep'=>$cep]);
    }

    public function obterEnderecoPorLogradouro($uf, $cidade, $logradouro = null, $bairro = null)
    {
        return $this->connect('ceps',['estado'=>$uf,'cidade'=>$cidade,'logradouro'=>$logradouro,'bairro'=>$bairro]);
    }
}