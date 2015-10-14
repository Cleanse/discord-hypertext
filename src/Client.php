<?php
namespace Discord;

use Discord\Api\ApiInterface;
use Discord\Exception\InvalidArgumentException;
use Discord\Exception\BadMethodCallException;
use Discord\HttpClient\HttpClient;
use Discord\HttpClient\HttpClientInterface;

class Client
{
	/**
	 * Constant for authentication method. Indicates the default, but deprecated
	 * login with username and token in URL.
	 */
	const AUTH_URL_TOKEN = 'url_token';
	/**
	 * Constant for authentication method. Not indicates the new login, but allows
	 * usage of unauthenticated rate limited requests for given client_id + client_secret.
	 */
	const AUTH_URL_CLIENT_ID = 'url_client_id';
	/**
	 * Constant for authentication method. Indicates the new favored login method
	 * with username and password via HTTP Authentication.
	 */
	const AUTH_HTTP_PASSWORD = 'http_password';
	/**
	 * Constant for authentication method. Indicates the new login method with
	 * with username and token via HTTP Authentication.
	 */
	const AUTH_HTTP_TOKEN = 'http_token';
	/**
	 * @var array
	 */
	private $options = array(
		'base_url'    => 'https://discordapp.com/api/',
		'user_agent'  => 'discord-php (https://github.com/Cleanse/discord-php)',
		'timeout'     => 10
	);
	/**
	 * The Buzz instance used to communicate with GitHub.
	 *
	 * @var HttpClient
	 */
	private $httpClient;
	/**
	 * Instantiate a new GitHub client.
	 *
	 * @param null|HttpClientInterface $httpClient Github http client
	 */
	public function __construct(HttpClientInterface $httpClient = null)
	{
		$this->httpClient = $httpClient;
	}
	/**
	 * @param string $name
	 *
	 * @throws InvalidArgumentException
	 *
	 * @return ApiInterface
	 */
	public function api($name)
	{
		switch ($name) {
			case 'authentication':
				$api = new Api\Authentication($this);
				break;
			case 'me':
			case 'current_user':
			case 'currentUser':
				$api = new Api\CurrentUser($this);
				break;
			case 'user':
			case 'users':
				$api = new Api\User($this);
				break;
			case 'guild':
			case 'guilds':
				$api = new Api\Guild($this);
				break;
			case 'rank':
			case 'ranks':
				$api = new Api\Rank($this);
				break;
			case 'channel':
			case 'channels':
				$api = new Api\Channel($this);
				break;
			case 'message':
			case 'messages':
				$api = new Api\Message($this);
				break;
			default:
				throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
		}
		return $api;
	}
	/**
	 * Authenticate a user for all next requests.
	 *
	 * @param string      $tokenOrLogin GitHub private token/username/client ID
	 * @param null|string $password     GitHub password/secret (optionally can contain $authMethod)
	 * @param null|string $authMethod   One of the AUTH_* class constants
	 *
	 * @throws InvalidArgumentException If no authentication method was given
	 */
	public function authenticate($tokenOrLogin, $password = null, $authMethod = null)
	{
		if (null === $password && null === $authMethod) {
			throw new InvalidArgumentException('You need to specify authentication method!');
		}
		if (null === $authMethod && in_array($password, array(self::AUTH_URL_TOKEN, self::AUTH_URL_CLIENT_ID, self::AUTH_HTTP_PASSWORD, self::AUTH_HTTP_TOKEN))) {
			$authMethod = $password;
			$password   = null;
		}
		if (null === $authMethod) {
			$authMethod = self::AUTH_HTTP_PASSWORD;
		}
		$this->getHttpClient()->authenticate($tokenOrLogin, $password, $authMethod);
	}
	/**
	 * Sets the URL of your GitHub Enterprise instance.
	 *
	 * @param string $enterpriseUrl URL of the API in the form of http(s)://hostname
	 */
	public function setEnterpriseUrl($enterpriseUrl)
	{
		$baseUrl = (substr($enterpriseUrl, -1) == '/') ? substr($enterpriseUrl, 0, -1) : $enterpriseUrl;
		$this->getHttpClient()->client->setBaseUrl($baseUrl . '/api/v3');
	}
	/**
	 * @return HttpClient
	 */
	public function getHttpClient()
	{
		if (null === $this->httpClient) {
			$this->httpClient = new HttpClient($this->options);
		}
		return $this->httpClient;
	}
	/**
	 * @param HttpClientInterface $httpClient
	 */
	public function setHttpClient(HttpClientInterface $httpClient)
	{
		$this->httpClient = $httpClient;
	}
	/**
	 * Clears used headers.
	 */
	public function clearHeaders()
	{
		$this->getHttpClient()->clearHeaders();
	}
	/**
	 * @param array $headers
	 */
	public function setHeaders(array $headers)
	{
		$this->getHttpClient()->setHeaders($headers);
	}
	/**
	 * @param string $name
	 *
	 * @throws InvalidArgumentException
	 *
	 * @return mixed
	 */
	public function getOption($name)
	{
		if (!array_key_exists($name, $this->options)) {
			throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $name));
		}
		return $this->options[$name];
	}
	/**
	 * @param string $name
	 * @param mixed  $value
	 *
	 * @throws InvalidArgumentException
	 * @throws InvalidArgumentException
	 */
	public function setOption($name, $value)
	{
		if (!array_key_exists($name, $this->options)) {
			throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $name));
		}
		$this->options[$name] = $value;
	}
	/**
	 * @param string $name
	 *
	 * @throws InvalidArgumentException
	 *
	 * @return ApiInterface
	 */
	public function __call($name, $args)
	{
		try {
			return $this->api($name);
		} catch (InvalidArgumentException $e) {
			throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
		}
	}
}