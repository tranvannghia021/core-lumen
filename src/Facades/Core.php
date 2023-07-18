<?php

namespace Devtvn\Sociallumen\Facades;

use Devtvn\Sociallumen\Service\Contracts\CoreContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Devtvn\Sociallumen\Service\Contracts\CoreContract user()
 * @method static \Devtvn\Sociallumen\Service\Contracts\CoreContract check()
 * @method static \Devtvn\Sociallumen\Service\Contracts\CoreContract setUser(array $user)
 * @see \Devtvn\Sociallumen\Service\Contracts\CoreContract
 *
 */
class Core extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CoreContract::class;
    }
}
