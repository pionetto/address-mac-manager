<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Validator;

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
        return view('list')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $regist = $request->regist;
        $secretary = $request->secretary;
        $workplace = $request->workplace;

        $validator = Validator::make(
            [
                'Nome' => $name,
                'Matricula' => $regist,
                'Secretaria' => $secretary,
                'Lotação' => $workplace
            ],
            [
                'Nome' => 'required|min:3',
                'Matricula' => 'required|numeric',
                'Secretaria' => 'required|min:3',
                'Lotação' => 'required|min:3'
            ],
            [
                'required' => ':attribute é obrigatório.',
                'numeric' => ':attribute precisa ser numérico.',
                'min' => ':attribute precisa ter pelo menos 6 caracteres.'            ]
            );
            if ($validator->fails()){
                return redirect()->action('ClientController@create')->withErrors($validator)->withInput();
            }

        $clients = new Client();
        $clients->name = $name;
        $clients->regist = $regist;
        $clients->secretary = $secretary;
        $clients->workplace = $workplace;
        $clients->save();

        return redirect()->action('ClientController@index')->withInput();
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
        return view('detailclient')->with('client', $client);
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
        return view('edit')->with(compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        
        return redirect()->action('ClientController@index')->withInput();
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
        
        return redirect()->action('ClientController@index');
    }
}
