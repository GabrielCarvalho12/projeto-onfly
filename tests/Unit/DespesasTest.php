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

    public function testPost()
    {
        $response = $this->http->request('POST', 'http://localhost:8000/api/despesas', [
            'headers'=> ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiN2JkZTU2NGI4OTMzMmRmNzEwYWFlYTgwMjdlOTI3NGYxZDhjMGZmOWRiNTVkOTAyODkwZjE1NDRiOTcyMzYxYzk2ZDZjNDIzNGE0NjBkNGEiLCJpYXQiOjE3MTIyMDkxODAuODY5ODU4LCJuYmYiOjE3MTIyMDkxODAuODY5ODYzLCJleHAiOjE3NDM3NDUxODAuODU1MDk0LCJzdWIiOiIxMyIsInNjb3BlcyI6W119.agIKdtK99QaM0p74EzxxCpnJepa-gsbePgaMtf15vfopNmMjSNyVMcvqwyqtuO_u7ja6sEGZowuWavifW0OhUjo2DR9QA6hBdRcXd5QKdYZ7Dm1MQnBhxWbbjs7qDr8eAXYEOd1mp7fEmqCF2RDbmKQbpWPfokt6L83cJL02T3paBiGrAdQZEEeTgjpFrcgjk6maN3fm0eZ9nDyWUT8GckPli4YpZrRq4HLFeyCBpE2MQNEgYboZq0lwFGy_Z-oC3owIIhjWE0j3CnKeMveAp3a2KvHVsarjzSExHX43cAVg8-CT92THLQ75ObY26y9q0kR1DD2YswbwN2Oew_-WXViaf7IErgHlg84GImep0Z-4PBdD6wFHN9J5B7MSWFDpfkTXtr3foXMn1oRmN26AmK926Af8JlP7P-nKlwOaN4GnC3L6t0eT0UzRrJsgxG6OFHWl3wmr6XVQuH4isg1hr2ATt8BSgQEz_zwSmlxm8MQvowXewy521qDThaVGKiG_mGF8GzmoKpbNwWUXWK4mDUDPwUhsh3p6MQfHyDU5lpkH0YiqNJ_ZKAGjhdCaXj6AnfkxIDuw1gMsTuhCmQQ1f_x0EBJ3OkflY1z9PdE32A4mzwmH5ozBdSk0Iie4crz1lBvsw-XigZYH44QASoCKhoeHdg4LyCDQUZW-quQSkv0'],
            'form_params' => [
                'descricao' => 'teste123',
                'data' => '2024-04-04',
                'usuario' => '13',
                'valor' => "200",
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        $this->assertIsInt($body->data->id);

    }

    public function testGET()
    {
        $response = $this->http->request('GET', 'http://localhost:8000/api/despesas', [
            'headers'=> [
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiN2JkZTU2NGI4OTMzMmRmNzEwYWFlYTgwMjdlOTI3NGYxZDhjMGZmOWRiNTVkOTAyODkwZjE1NDRiOTcyMzYxYzk2ZDZjNDIzNGE0NjBkNGEiLCJpYXQiOjE3MTIyMDkxODAuODY5ODU4LCJuYmYiOjE3MTIyMDkxODAuODY5ODYzLCJleHAiOjE3NDM3NDUxODAuODU1MDk0LCJzdWIiOiIxMyIsInNjb3BlcyI6W119.agIKdtK99QaM0p74EzxxCpnJepa-gsbePgaMtf15vfopNmMjSNyVMcvqwyqtuO_u7ja6sEGZowuWavifW0OhUjo2DR9QA6hBdRcXd5QKdYZ7Dm1MQnBhxWbbjs7qDr8eAXYEOd1mp7fEmqCF2RDbmKQbpWPfokt6L83cJL02T3paBiGrAdQZEEeTgjpFrcgjk6maN3fm0eZ9nDyWUT8GckPli4YpZrRq4HLFeyCBpE2MQNEgYboZq0lwFGy_Z-oC3owIIhjWE0j3CnKeMveAp3a2KvHVsarjzSExHX43cAVg8-CT92THLQ75ObY26y9q0kR1DD2YswbwN2Oew_-WXViaf7IErgHlg84GImep0Z-4PBdD6wFHN9J5B7MSWFDpfkTXtr3foXMn1oRmN26AmK926Af8JlP7P-nKlwOaN4GnC3L6t0eT0UzRrJsgxG6OFHWl3wmr6XVQuH4isg1hr2ATt8BSgQEz_zwSmlxm8MQvowXewy521qDThaVGKiG_mGF8GzmoKpbNwWUXWK4mDUDPwUhsh3p6MQfHyDU5lpkH0YiqNJ_ZKAGjhdCaXj6AnfkxIDuw1gMsTuhCmQQ1f_x0EBJ3OkflY1z9PdE32A4mzwmH5ozBdSk0Iie4crz1lBvsw-XigZYH44QASoCKhoeHdg4LyCDQUZW-quQSkv0',
                'email' => 'gabriellcarvalho12@hotmail.com'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        $this->assertIsInt($body->data['0']->id);

    }

    public function testPUT()
    {
        $response = $this->http->request('PUT', 'http://localhost:8000/api/despesas/19', [
            'headers'=> ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiN2JkZTU2NGI4OTMzMmRmNzEwYWFlYTgwMjdlOTI3NGYxZDhjMGZmOWRiNTVkOTAyODkwZjE1NDRiOTcyMzYxYzk2ZDZjNDIzNGE0NjBkNGEiLCJpYXQiOjE3MTIyMDkxODAuODY5ODU4LCJuYmYiOjE3MTIyMDkxODAuODY5ODYzLCJleHAiOjE3NDM3NDUxODAuODU1MDk0LCJzdWIiOiIxMyIsInNjb3BlcyI6W119.agIKdtK99QaM0p74EzxxCpnJepa-gsbePgaMtf15vfopNmMjSNyVMcvqwyqtuO_u7ja6sEGZowuWavifW0OhUjo2DR9QA6hBdRcXd5QKdYZ7Dm1MQnBhxWbbjs7qDr8eAXYEOd1mp7fEmqCF2RDbmKQbpWPfokt6L83cJL02T3paBiGrAdQZEEeTgjpFrcgjk6maN3fm0eZ9nDyWUT8GckPli4YpZrRq4HLFeyCBpE2MQNEgYboZq0lwFGy_Z-oC3owIIhjWE0j3CnKeMveAp3a2KvHVsarjzSExHX43cAVg8-CT92THLQ75ObY26y9q0kR1DD2YswbwN2Oew_-WXViaf7IErgHlg84GImep0Z-4PBdD6wFHN9J5B7MSWFDpfkTXtr3foXMn1oRmN26AmK926Af8JlP7P-nKlwOaN4GnC3L6t0eT0UzRrJsgxG6OFHWl3wmr6XVQuH4isg1hr2ATt8BSgQEz_zwSmlxm8MQvowXewy521qDThaVGKiG_mGF8GzmoKpbNwWUXWK4mDUDPwUhsh3p6MQfHyDU5lpkH0YiqNJ_ZKAGjhdCaXj6AnfkxIDuw1gMsTuhCmQQ1f_x0EBJ3OkflY1z9PdE32A4mzwmH5ozBdSk0Iie4crz1lBvsw-XigZYH44QASoCKhoeHdg4LyCDQUZW-quQSkv0'],
            'form_params' => [
                'descricao' => 'test',
                'data' => '2024-04-03',
                'valor' => "100",
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode($response->getBody()->getContents());

        $this->assertIsInt($body->data->id);

    }

    public function testDELETE()
    {
        $response = $this->http->request('DELETE', 'http://localhost:8000/api/despesas/58', [
            'headers'=> ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiN2JkZTU2NGI4OTMzMmRmNzEwYWFlYTgwMjdlOTI3NGYxZDhjMGZmOWRiNTVkOTAyODkwZjE1NDRiOTcyMzYxYzk2ZDZjNDIzNGE0NjBkNGEiLCJpYXQiOjE3MTIyMDkxODAuODY5ODU4LCJuYmYiOjE3MTIyMDkxODAuODY5ODYzLCJleHAiOjE3NDM3NDUxODAuODU1MDk0LCJzdWIiOiIxMyIsInNjb3BlcyI6W119.agIKdtK99QaM0p74EzxxCpnJepa-gsbePgaMtf15vfopNmMjSNyVMcvqwyqtuO_u7ja6sEGZowuWavifW0OhUjo2DR9QA6hBdRcXd5QKdYZ7Dm1MQnBhxWbbjs7qDr8eAXYEOd1mp7fEmqCF2RDbmKQbpWPfokt6L83cJL02T3paBiGrAdQZEEeTgjpFrcgjk6maN3fm0eZ9nDyWUT8GckPli4YpZrRq4HLFeyCBpE2MQNEgYboZq0lwFGy_Z-oC3owIIhjWE0j3CnKeMveAp3a2KvHVsarjzSExHX43cAVg8-CT92THLQ75ObY26y9q0kR1DD2YswbwN2Oew_-WXViaf7IErgHlg84GImep0Z-4PBdD6wFHN9J5B7MSWFDpfkTXtr3foXMn1oRmN26AmK926Af8JlP7P-nKlwOaN4GnC3L6t0eT0UzRrJsgxG6OFHWl3wmr6XVQuH4isg1hr2ATt8BSgQEz_zwSmlxm8MQvowXewy521qDThaVGKiG_mGF8GzmoKpbNwWUXWK4mDUDPwUhsh3p6MQfHyDU5lpkH0YiqNJ_ZKAGjhdCaXj6AnfkxIDuw1gMsTuhCmQQ1f_x0EBJ3OkflY1z9PdE32A4mzwmH5ozBdSk0Iie4crz1lBvsw-XigZYH44QASoCKhoeHdg4LyCDQUZW-quQSkv0']
        ]);

        $this->assertEquals(200, $response->getStatusCode());

    }
}
