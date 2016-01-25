<?php

Route::group(['prefix' => 'neocep', 'namespace' => '\Celepar\Light\Neocep'], function() {
    Route::get('paises', 'NeocepRest@paises');
    Route::get('ufs', 'NeocepRest@ufs');
    Route::get('localidades/{siglaUf}/{tipoLocalidade?}/{tipoCodificacaoLocalidadeRetorno?}', 'NeocepRest@localidades');
    Route::get('localidade/{chaveLocalidade}/{tipoCodificacaoLocalidade?}/{tipoCodificacaoLocalidadeRetorno?}', 'NeocepRest@localidade');
    Route::get('bairros/{chaveLocalidade}', 'NeocepRest@bairros');
    Route::get('logradouro/{nomeLogradouro}/{chaveLocalidade}/{tipoCodificacaoLocalidade?}', 'NeocepRest@logradouro');
    Route::get('endereco/{cep}/{tipoCodificacaoLocalidadeRetorno?}', 'NeocepRest@endereco');
});