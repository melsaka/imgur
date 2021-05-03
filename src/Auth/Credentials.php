<?php

namespace Melsaka\Auth;

use Exception;

class Credentials
{
    protected $username;

    protected $clientId;
    
    protected $clientSecret;

    protected $accessToken;

    protected $refreshToken;

    public function __construct(array $credentials)
    {
        $this->isSomethingMissing($credentials);

        $this->username         = $credentials['username'];
        $this->clientId         = $credentials['client_id'];
        $this->clientSecret     = $credentials['client_secret'];
        $this->accessToken      = $credentials['access_token'];
        $this->refreshToken     = $credentials['refresh_token'];
    }

    protected function isSomethingMissing($credentials)
    {
        $requiredInputs = [
            'username',
            'client_id',
            'client_secret',
            'access_token',
            'refresh_token'
        ];

        foreach ($requiredInputs as $input) {
            if (!array_key_exists($input, $credentials)) {
                throw new Exception("{$input} is required for the api client to work properly.");
            }
        }
    }

    public function getAccessTokenGenerators()
    {
        return [
            'refresh_token' => $this->refreshToken,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'refresh_token',
        ];
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
