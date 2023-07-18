<?php

namespace Devtvn\Sociallumen\Ecommerces;

class Ecommerces
{
    /**
     * driver support connect class name with channel
     * @param $channel
     * @return AEcommerce|null
     */
    public static function driver($channel): ?AEcommerce
    {
        $nameSpaces = '\Devtvn\Sociallumen\Ecommerces\RestApi\\';
        $path = __DIR__ . '/RestApi/';
        $files = array_diff(scandir($path), ['..', '.', 'Request.php']);
        foreach ($files as $file) {
            if ($file === ucfirst($channel) . '.php') {
                $class = $nameSpaces . trim($file, '.php');
                return (new $class());
            }
        }
        return null;
    }
}