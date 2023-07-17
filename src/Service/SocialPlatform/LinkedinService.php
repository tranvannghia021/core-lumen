<?php

namespace Devtvn\Social\Service\SocialPlatform;

use Devtvn\Social\Facades\Social;
use Devtvn\Social\Helpers\CoreHelper;
use Devtvn\Social\Helpers\EnumChannel;
use Devtvn\Social\Repositories\UserRepository;
use Devtvn\Social\Service\ACoreService;
use Devtvn\Social\Service\ICoreService;
use Devtvn\Social\Traits\Response;
use Illuminate\Support\Facades\Hash;

class LinkedinService extends ACoreService
{
    use Response;

    public function __construct()
    {
        $this->platform = Social::driver(EnumChannel::LINKEDIN);
        parent::__construct();
    }

    /**
     * build structure ready save databases
     * @param ...$payload
     * @return array
     */
    public function getStructure(...$payload)
    {
        [$token, $user, $additions] = $payload;
        return [
            'internal_id' => (string)$user['data']['id'],
            'email_verified_at' => @$user['data']['verified_email'] ?? now(),
            'first_name' => @$user['data']['localizedFirstName'] ?? @$user['data']['localizedLastName'],
            'last_name' => '',
            'email' => @$additions['data']['elements'][0]['handle~']['emailAddress'],
            'avatar' => @$user['data']['picture'],
            'password' => Hash::make(123456789),
            'platform' => EnumChannel::LINKEDIN,
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
        [$token] = $variable;
        return $this->platform->setToken($token['data']['access_token'])->email();
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