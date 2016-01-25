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

    public function paises()
    {

    }

    public function ufs()
    {

    }

    public function cidades($uf)
    {
        return $this->connect('cities',['estado'=>$uf]);
    }

    public function endereco($cep)
    {
        // TODO: Implement endereco() method.
    }
}