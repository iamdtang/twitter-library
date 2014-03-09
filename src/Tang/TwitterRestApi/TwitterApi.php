<?php

namespace Tang\TwitterRestApi;

class TwitterApi
{
    const AUTH_URL = 'https://api.twitter.com/oauth2/token';
    const API_ENDPOINT = 'https://api.twitter.com/1.1/';

    protected $api_key;
    protected $api_secret;
    protected $bearer_token;
    protected $last_url;

    public function __construct(array $credentials)
    {
        $this->api_key = $credentials['api_key'];
        $this->api_secret = $credentials['api_secret'];

        if (array_key_exists('bearer_token', $credentials)) {
            $this->bearer_token = $credentials['bearer_token'];
        }
    }

    public function authenticate($bearer_token = null)
    {
        if ($bearer_token) {
            $this->bearer_token = $bearer_token;
            return $this;
        }

        $composite_key = rawurlencode($this->api_key) . ':' . rawurlencode($this->api_secret);
        $base64 = base64_encode($composite_key);

        $json = $this->request(
          [
            CURLOPT_HTTPHEADER => [
              'Authorization: Basic ' . $base64,
              'Content-type: application/x-www-form-urlencoded;charset=UTF-8',
            ],
            CURLINFO_HEADER_OUT => true,
            CURLOPT_URL => self::AUTH_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_SSL_VERIFYPEER => false
          ]
        );

        $json_obj = json_decode($json);
        $this->bearer_token = $json_obj->access_token;
        return $this;
    }

    protected function request($options)
    {
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $json = curl_exec($ch);
//        $info = curl_getinfo($ch);
        curl_close($ch);

        return $json;
    }

    /**
     * Returns the bearer_token that is generated in authenticate().
     * This can be cached to improve performance
     * @return string
     */
    public function getBearerToken()
    {
        return $this->bearer_token;
    }

    public function setBearerToken($bt)
    {
        $this->bearer_token = $bt;
    }

    /**
     * Make a GET request to a twitter API endpoint
     * @param  string $path the resource path, like statuses/user_timeline
     * @param  array $qs query string parameters
     * @return string a string of JSON
     */
    public function get($path = 'statuses/user_timeline', $qs = [], $decoded = false)
    {
        $this->last_url = self::API_ENDPOINT . $path . '.json?' . http_build_query($qs);
        $json = $this->request(
          [
            CURLOPT_HTTPHEADER => [
              'Authorization: Bearer ' . $this->bearer_token,
              'Host: api.twitter.com',
              'Content-type: application/x-www-form-urlencoded;charset=UTF-8'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->last_url
          ]
        );

        return ($decoded ? json_decode($json) : $json);
    }

    /**
     * Returns the full URL of the last API call you made
     * @return string URL of last API call you made
     */
    public function getLastUrl()
    {
        return $this->last_url;
    }
}