<?php

namespace Devtvn\Sociallumen\Service\SocialPlatform;

use Devtvn\Sociallumen\Facades\Social;
use Devtvn\Sociallumen\Helpers\CoreHelper;
use Devtvn\Sociallumen\Helpers\EnumChannel;
use Devtvn\Sociallumen\Repositories\UserRepository;
use Devtvn\Sociallumen\Service\ACoreService;
use Devtvn\Sociallumen\Service\ICoreService;
use Devtvn\Sociallumen\Traits\Response;
use Illuminate\Support\Facades\Hash;

class TwitterService extends ACoreService
{
    use Response;


    public function __construct()
    {
        $this->platform = Social::driver(EnumChannel::TWITTER);
        $this->usesPKCE=true;
        parent::__construct();
    }


    /**
     * build structure ready save databases
     * @param ...$payload
     * @return array
     */
    public function getStructure(...$payload)
    {
        [$token,$user]=$payload;
       return[
           'internal_id' => (string)$user['data']['id'],
           'email_verified_at' => @$user['data']['verified_email'] ?? now(),
           'first_name' => @$user['data']['name'] ?? @$user['data']['given_name'],
           'last_name' => '',
           'email' => @$user['data']['email'],
           'avatar' => @$user['data']['picture'],
           'password' => Hash::make(123456789),
           'platform' => EnumChannel::TWITTER,
           'status' => true,
           'access_token' => @$token['data']['access_token'],
           'expire_token' => date("Y-m-d H:i:s",
               time() + @$token['data']['expires_in'] ?? @$token['data']['expires'] ?? 0),
           'created_at' => now(),
           'updated_at' => now(),
       ];
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