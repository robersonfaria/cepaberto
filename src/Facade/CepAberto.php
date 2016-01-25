<?php
/**
 * Created by PhpStorm.
 * User: roberson.faria
 * Date: 25/01/16
 * Time: 16:59
 */

namespace Rfweb\Cepaberto\Facade;

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