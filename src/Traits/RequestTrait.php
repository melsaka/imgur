<?php

namespace Melsaka\Traits;

use Melsaka\Auth\Credentials;

trait RequestTrait
{
    protected $endpoint;

    protected $credentials;

    protected $username;
    
    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
        $this->username = $credentials->getUsername();
    }

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    protected function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    protected function setQueryString($key, $value)
    {
        $endpoint = $this->getEndpoint();

        $endpoint = str_replace("{{$key}}", $value, $endpoint);

        $this->setEndpoint($endpoint);
    }

    protected function get($data = [])
    {
        return $this->request('GET', $data);
    }

    protected function post($data = [])
    {
        return $this->request('POST', $data);
    }

    protected function put($data = [])
    {
        return $this->request('PUT', $data);
    }

    protected function delete($data = [])
    {
        return $this->request('DELETE', $data);
    }

    protected function request(string $type, array $data)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/vnd.api+json',
            'Authorization: Bearer '. $this->credentials->getAccessToken()
        ]);

        curl_setopt($curl, CURLOPT_URL, $this->endpoint);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_ENCODING, '');

        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);

        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }

    public function __call($name, $arguments)
    {
        if (stripos($name, "setQuery") === 0) {
            $key = lcfirst(
                str_replace('setQuery', '', $name)
            );

            $this->setQueryString($key, ...$arguments);
        }
    }
}
