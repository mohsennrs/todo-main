<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TaskRepository
{
    public function index(Request $request)
    {
        $request = Request::create('/tasks', 'GET');
        $response = Route::dispatch($request);
        if($response->status() == 200) {

            return json_decode($response->content())->data;
        }
        dd($response );
        return ['error' => true];
    }



    public function store(Request $request)
    {
        $request = Request::create('/tasks', 'POST', [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'labels' => $request->get('labels')
        ]);

        $request->headers->set('Authorization','Bearer '.$request->bearerToken());

        $response =  app()->handle($request);

        if($response->status() == 201) {
            return json_decode($response->content());
        }
        return ['error' => true];
    }

    public function get($id)
    {
        $request = Request::create('/tasks/'.$id, 'get');
        $response =  Route::dispatch($request);
        if($response->status() == 200) {
            return json_decode($response->content())->data;
        }

        return ['error' => true];
    }

    public function update($id, Request $request)
    {

        $request = Request::create('/tasks/'.$id , 'PATCH', [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'labels' => $request->get('labels'),
            'status' => $request->get('status')
        ]);

        $response =  Route::dispatch($request);

        if($response->status() == 200) {
            return json_decode($response->content());

        }

        return ['message' => 'error'];
    }

}
