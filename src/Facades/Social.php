<?php

namespace Devtvn\Sociallumen\Facades;

use Devtvn\Sociallumen\Ecommerces\Ecommerces;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Devtvn\Sociallumen\Ecommerces\Ecommerces driver(string $channel)
 * @see \Devtvn\Sociallumen\Ecommerces\Ecommerces
 */
class Social extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Ecommerces::class;
    }
}