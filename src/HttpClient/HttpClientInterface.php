<?php
namespace Discord\HttpClient;

interface HttpClientInterface
{
	public function request($httpMethod = 'GET', $path, array $params = []);
}