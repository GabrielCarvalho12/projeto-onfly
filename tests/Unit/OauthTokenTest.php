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

    //Teste da geração do Bearer Token de autenticação
    public function testOauthToken()
    {
        //Testa a geração do token de autenticação da API
        $response = $this->http->request('POST', 'http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 1, //Client ID gerado através do comando "php artisan passport:install',
                'client_secret' => '', //(Key gerada através do comando "php artisan passport:install',
                'username' => 'admin@email.com', //Email do usuário criado através da API User
                'password' => 'admin' //Senha criada através da API User
            ],
        ]);

        $body = json_decode($response->getBody()->getContents());

        //Testa o tempo de expiração do token gerado
        $this->assertEquals(31536000, $body->expires_in);

        //Testa o tipo de token gerado
        $this->assertEquals('Bearer', $body->token_type);

        //Testa a geração dos tokens
        $this->assertNotEmpty($body->access_token);
        $this->assertNotEmpty($body->refresh_token);
    }
}
