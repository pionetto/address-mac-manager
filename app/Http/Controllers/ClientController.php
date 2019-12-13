<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Validator;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $name = $request->name;
        $regist = $request->regist;
        $secretary = $request->secretary;
        $workplace = $request->workplace;

        $clients = new Client();
        $clients->name = $name;
        $clients->regist = $regist;
        $clients->secretary = $secretary;
        $clients->workplace = $workplace;
        $clients->save();

        return redirect()->route('client.index')->with('data', [
            'status' => 'success',
            'message' => 'Cliente adicionado com sucesso',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('client.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::find($id);
        return view('client.edit')->with(compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $name = $request->name;
        $regist = $request->regist;
        $secretary = $request->secretary;
        $workplace = $request->workplace;
        
        $clients = Client::find($id);
        $clients->name = $name;
        $clients->regist = $regist;
        $clients->secretary = $secretary;
        $clients->workplace = $workplace;
        $clients->save();
        
        return redirect()->route('client.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::find($id);
        $clients->delete();
        
        return redirect()->route('client.index');
    }
}
