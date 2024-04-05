<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use  GuzzleHttp\Client;

class OauthTokenTest extends TestCase
{
    private $http;

    public function setUp(): void
    {
        $this->http = new Client(['http_errors' => false]);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }

    public function testOauthToken()
    {
        $response = $this->http->request('POST', 'http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 1,
                'client_secret' => '(Key gerada após exucução do comando "php artisan passport:install")',
                'username' => "teste@teste.com",
                'password' => '123',
            ],
        ]);

        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(31536000, $body->expires_in);

        $this->assertEquals('Bearer', $body->token_type);

        $this->assertNotEmpty($body->access_token);
        $this->assertNotEmpty($body->refresh_token);
    }
}
