# CepAberto Package

Pacote Laravel para consulta de ceps no [CepAberto](http://cepaberto.com/)

## ATENÇÃO

O pacote foi atualizado para a versão 3 do CepAberto(que já está funcionando), versão 2 será descontinuada em Junho/2018, consequentemente esse pacote na versão 1.0.6 deixará de funcionar também. Atualize para a versão 2.0.0 o seu pacote

## Instalação

##### Instale a dependencia pelo composer
```bash
composer require robersonfaria/cepaberto
```

##### Configure o sua aplicação 

###### Laravel 5.5+

O provider e o alias será adicionado pelo Discovery

###### Laravel 5.5-
Adicione o provider e o alias ao arquivo **config/app.php**
```php
'providers' => [
    ...
    RobersonFaria\Cepaberto\Providers\CepabertoServiceProvider::class,
],

'aliases' => [
    ...
    'CepAberto' => RobersonFaria\Cepaberto\Facade\CepAberto::class,
],
```

##### Publique o arquivo de configuração

```bash
php artisan vendor:publish --provider="RobersonFaria\Cepaberto\Providers\CepabertoServiceProvider"
```

##### Configure seu token:

No seu arquivo de ambiente **.env** adicione o seu token
```
TOKEN_CEPABERTO=<aqui-vai-seu-token-do-cep-aberto>,
```

## Uso

Basta chamar pela facade os métodos disponíveis:

| Assinatura do Método | Descrição | Exemplo |
|---|---|---|
| listarPaises() | Lista todos os paises, no momento só o Brasil | CepAberto::listarPaises() |
| listarUfs([$pais="BRA"]) | Lista todos os estados do pais passado como parâmetro, Default: Brasil | CepAberto::listarUfs() |
| listarCidades($uf) | Lista todas as cidades de um estado, obrigatório informar o estado. | CepAberto::listarCidades('PR') |
| obterEnderecoPorCep($cep) | Lista o endereço encontrado para determinado cep. | CepAberto::obterEnderecoPorCep('80420010') |
| obterEnderecoPorLogradouro($uf, $cidade, [$logradouro], [$bairro]) | Lista o endereço encontrado para determinado logradouro e/ou bairo | CepAberto::obterEnderecoPorLogradouro('PR','Curitiba','Sete de Setembro') |
| obterGeo($lat, $lng) | Busca do CEP pela Latitude e Longitude mais próxima | CepAberto::obterGeo('-20.55','-43.63') |

