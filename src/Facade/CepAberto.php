<?php
namespace Cepaberto\Cepaberto\Facade;

use Illuminate\Support\Facades\Facade;

class CepAberto extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cepaberto'; // the IoC binding.
    }
}