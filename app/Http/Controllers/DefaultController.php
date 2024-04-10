<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class DefaultController extends Controller
{
    /**
     * @var object
     */
    private $client;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function authenticate(Request $request)
    {
        $request->request->add([
            'username' => $request->username,
            'password' => $request->password,
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }
}
