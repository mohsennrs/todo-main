<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LabelRepository
{
    public function index(Request $request = null)
    {
        $request = Request::create('/labels', 'GET');

          $response = Route::dispatch($request);
          return $response->getData()->data;
    }
    public function store(Request $request)
    {
        $request = Request::create('/labels', 'POST', [
            'text' => $request->get('text')
        ]);

          $response = Route::dispatch($request);

          if($response->status() == 200) {
            return json_decode($response->content());
          }

          return ['error' => true];
        // return json_decode($response->content());
    }
}
