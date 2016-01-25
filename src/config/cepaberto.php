<?php
return [
    /**
     * Tempo em milisegundos que o cache irá ser persistido.
     */
    "time-cache" => 1440,

    /**
     * Url de acesso ao serviço rest do CEP Aberto (http://www.cepaberto.com)
     *
     * Os parâmetros abaixo já vem configurado corretamente e só deve ser alterado em caso de alteração da URL no CEP Aberto ou atualização de versão.
     *
     * ATENÇÂO: O pacote está preparado para trabalhar com a versão que vem configurado na URL do serviço, alterar a versão na URL pode causar erros no pacote
     */
    "url-service" => [
        "ceps" => "http://www.cepaberto.com/api/v2/ceps.json",
        "cities" => "http://www.cepaberto.com/api/v2/cities.json"
    ],

    /**
     * Token
     *
     * O token deve ser gerado no site CEP Aberto (http://www.cepaberto.com). Para ter o seu token basta se cadastrar e acessar o menu API -> Token de Acesso
     */
    "token" => "",
];