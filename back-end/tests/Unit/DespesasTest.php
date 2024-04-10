<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use  GuzzleHttp\Client;

class DespesasTest extends TestCase
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
        //Testa a inserção de uma despesa
        $response = $this->http->request('POST', 'http://localhost:8000/api/despesas', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
            'form_params' => [
                'descricao' => 'testeInsert',
                'data' => '2024-01-01',
                'usuario' => '1',
                'valor' => '200'
            ],
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id despesa é inteiro
        $this->assertIsInt($body->data->id);

    }

    //Testa as requisições do tipo GET
    public function testGET()
    {
        //Testa o retorno de todas as despesas cadastradas do usuário
        $response = $this->http->request('GET', 'http://localhost:8000/api/despesas', [
            'headers'=> [
                'Authorization' => 'Bearer {token}', //Token gerado através da rota /Oauth/Token
                'email' => 'gabriellcarvalho12@hotmail.com' //Email do usuario criado através da API User
            ]
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id despesa é inteiro
        $this->assertIsInt($body->data['0']->id);

        //Testa o retorno de uma despesa específica
        $response = $this->http->request('GET', 'http://localhost:8000/api/despesas/{id}', [
            'headers'=> [
                'Authorization' => 'Bearer {token}', //Token gerado através da rota /Oauth/Token
            ]
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id despesa é inteiro
        $this->assertIsInt($body->data->id);

    }

    public function testPUT()
    {
        //Testa a atualização de uma despesa
        $response = $this->http->request('PUT', 'http://localhost:8000/api/despesas/{id}', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
            'form_params' => [
                'descricao' => 'testUpdate',
                'data' => '2024-01-01',
                'valor' => '100'
            ],
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        //Testa se o id despesa é inteiro
        $this->assertIsInt($body->data->id);

    }

    public function testDELETE()
    {
        //Testa a exclusão de uma despesa
        $response = $this->http->request('DELETE', 'http://localhost:8000/api/despesas/{id}}', [
            'headers'=> ['Authorization' => 'Bearer {token}'], //Token gerado através da rota /Oauth/Token
        ]);

        //Testa se o status de retorno da API é igual a 200
        $this->assertEquals(200, $response->getStatusCode());

    }
}
