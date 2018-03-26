<?php
return [
    /**
     * Tempo em minutos que o cache irá ser persistido.
     * Default: 1440 min = 24 horas
     * para inativar o cache basta informar 0 ou null nessa configuração
     */
    "time-cache" => 1440,

    /**
     * Url de acesso ao serviço rest do CEP Aberto (http://www.cepaberto.com)
     *
     * Os parâmetros abaixo já vem configurado corretamente e só deve ser alterado em caso de alteração da URL no CEP Aberto ou atualização de versão.
     *
     * ATENÇÂO: O pacote está preparado para trabalhar com a versão que vem configurado na URL do serviço, alterar a versão na URL pode causar erros no pacote
     */
    "host" => "http://www.cepaberto.com/api/v3/",

    /**
     * Token
     *
     * O token deve ser gerado no site CEP Aberto (http://www.cepaberto.com). Para ter o seu token basta se cadastrar e acessar o menu API -> Token de Acesso
     */
    "token" => env("TOKEN_CEPABERTO"),
];