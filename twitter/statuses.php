<?php

namespace Twitter;

class Statuses {
	const AUTH_URL = 'https://api.twitter.com/oauth2/token';
	const API_ENDPOINT = 'https://api.twitter.com/1.1/';

	protected $consumer_key;
	protected $secret;
	protected $_bearer_token;

	protected function request($options)
	{
		$ch = curl_init();
	  curl_setopt_array($ch, $options);
	  $json = curl_exec($ch);
	  $info = curl_getinfo($ch);
	  curl_close($ch);

	  return $json;
	}

	public function __construct(array $credentials)
	{
		$this->consumer_key = $credentials['consumer_key'];
		$this->secret = $credentials['secret'];

		if (array_key_exists('bearer_token', $credentials)) {
			$this->_bearer_token = $credentials['bearer_token'];
		}
	}

	public function authenticate()
	{
		$composite_key = rawurlencode($this->consumer_key) . ':' . rawurlencode($this->secret);
		$base64 = base64_encode($composite_key);

		$json = $this->request(array( 
	    CURLOPT_HTTPHEADER => array(
	    	'Authorization: Basic ' . $base64,
	    	'Content-type: application/x-www-form-urlencoded;charset=UTF-8',
	    ),
	    CURLINFO_HEADER_OUT => true,
	    CURLOPT_URL => self::AUTH_URL,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
	    CURLOPT_SSL_VERIFYPEER => false
	  ));

		$json_obj = json_decode($json);
		$this->_bearer_token = $json_obj->access_token;
		return $this;
	}

	/**
	 * Make a GET request to a twitter API endpoing
	 * @param  string $path the resource path, like statuses/user_timeline
	 * @param  array $qs query string parameters
	 * @return string a string of JSON
	 */
	public function get($path = 'statuses/user_timeline', $qs)
	{
		$json = $this->request(array(
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $this->_bearer_token,
				'Host: api.twitter.com',
				'Content-type: application/x-www-form-urlencoded;charset=UTF-8'
			),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => self::API_ENDPOINT . $path . '.json?' . http_build_query($qs)
		));

		return $json;
	}

	public function getBearerToken()
	{
		return $this->_bearer_token;
	}

	public function setBearerToken($bt)
	{
		$this->_bearer_token = $bt;
	}
}