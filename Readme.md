#CepAberto Package

Pacote Laravel para consulta de ceps no [CepAberto](http://cepaberto.com/)

##Instalação

##### Instale a dependencia pelo composer
```bash
composer require robersonfaria/cepaberto
```

##### Configure o sua aplicação 

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
php artisan vendo:publish --provider="RobersonFaria\Cepaberto\Providers\CepabertoServiceProvider"
```

##### Configure seu token:

No arquivo **config/cepaberto.php** adicione o seu token
```
"token" => "<aqui-vai-seu-token-do-cep-aberto>",
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

