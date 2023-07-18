<?php

namespace Devtvn\Sociallumen\Service\SocialPlatform;


use Devtvn\Sociallumen\Ecommerces\RestApi\Tiktok;
use Devtvn\Sociallumen\Facades\Social;
use Devtvn\Sociallumen\Helpers\EnumChannel;
use Devtvn\Sociallumen\Service\ACoreService;
use Devtvn\Sociallumen\Service\ICoreService;
use Devtvn\Sociallumen\Traits\Response;

class TiktokService extends ACoreService
{
    use Response;
    public function __construct()
    {
        $this->platform=Social::driver(EnumChannel::TIKTOK);
        parent::__construct();
    }

    /**
     * build structure ready save databases
     * @param ...$payload
     * @return array
     */
    public function getStructure(...$payload)
    {
        // TODO: Implement getStructure() method.
    }

    /**
     * handle logic service api additions
     * @param array $payload
     * @param ...$variable
     * @return array
     */
    public function handleAdditional(array $payload, ...$variable)
    {
        // TODO: Implement handleAdditional() method.
    }

    /**
     * handle before install
     * @param ...$payload
     * @return void
     */
    public function beforeInstall(...$payload)
    {
        // TODO: Implement beforeInstall() method.
    }

    /**
     * handle between api get token and get profile
     * @param ...$payload
     * @return void
     */
    public function middleInstallBothTokenAndProfile(...$payload)
    {
        // TODO: Implement middleInstallBothTokenAndProfile() method.
    }

    /**
     * handle after install
     * @param ...$payload
     * @return void
     */
    public function afterInstall(...$payload)
    {
        // TODO: Implement afterInstall() method.
    }
}
