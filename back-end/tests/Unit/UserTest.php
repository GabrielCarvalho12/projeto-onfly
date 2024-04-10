<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use  GuzzleHttp\Client;

class UserTest extends TestCase
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

    //Testa as requisições do tipo POST
    public function testPost()
    {
        //Testa a inserção de um usuário
        $response = $this->http->request('POST', 'http://localhost:8000/api/users', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
            'form_params' => [
                'name' => 'nameTeste',
                'email' => 'teste@email.com',
                'password' => 'senhaTeste',
                'password_confirmation' => 'senhaTeste'
            ],
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id usuário é inteiro
        $this->assertIsInt($body->data->id);

    }

    //Testa as requisições do tipo GET
    public function testGET()
    {
        //Testa o retorno de todos os usuários cadastrados
        $response = $this->http->request('GET', 'http://localhost:8000/api/users', [
            'headers'=> [
                'Authorization' => 'Bearer {token}', //Token gerado através da rota /Oauth/Token
            ]
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id usuário é inteiro
        $this->assertIsInt($body->data['0']->id);

        //Testa o retorno de um usuário específico
        $response = $this->http->request('GET', 'http://localhost:8000/api/users/{id}', [
            'headers'=> [
                'Authorization' => 'Bearer {token}', //Token gerado através da rota /Oauth/Token
            ]
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id usuário é inteiro
        $this->assertIsInt($body->data->id);

    }

    public function testPUT()
    {
        //Testa a atualização de um usuário
        $response = $this->http->request('PUT', 'http://localhost:8000/api/users/{id}', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
            'form_params' => [
                'name' => 'nameTeste',
                'email' => '2024-01-01',
                'password' => 'senhaTeste'
            ],
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id usuário é inteiro
        $this->assertIsInt($body->data->id);

    }

    public function testDELETE()
    {
        //Testa a exclusão de um usuário
        $response = $this->http->request('DELETE', 'http://localhost:8000/api/users/{id}', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

    }
}
