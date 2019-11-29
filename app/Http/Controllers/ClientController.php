<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Client;

use Validator;

class ClientController extends Controller
{
    public function list(){

        $clients = Client::all();
        return view('list')->with('clients', $clients);
    }
    
    public function register(){
        return view('register');
    }
    
    public function edit($id){
        $clients = Client::find($id);
        if (empty($clients)){
            return 'Cliente não existe';
            } else {
                return view('edit')->with('clients', $clients);
        }
    }
    
    public function delete($id){
        $clients = Client::find($id);
        $clients->delete();
        
        return redirect()->action('ClientController@list');
    }
    public function update($id){
        $name = Request::input('name');
        $regist = Request::input('regist');
        $secretary = Request::input('secretary');
        $workplace = Request::input('workplace');
        
        $clients = Client::find($id);
        $clients->name = $name;
        $clients->regist = $regist;
        $clients->secretary = $secretary;
        $clients->workplace = $workplace;
        $clients->save();

        return redirect()->action('ClientController@list')->withInput();
    }    
/*    public function apagar($id){
        $id = Request::delete();        
        return view('apagar');
    }    */

    public function saving(){
        $name = Request::input('name');
        $regist = Request::input('regist');
        $secretary = Request::input('secretary');
        $workplace = Request::input('workplace');

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
                return redirect()->action('ClientController@register')->withErrors($validator)->withInput();
            }

        $clients = new Client();
        $clients->name = $name;
        $clients->regist = $regist;
        $clients->secretary = $secretary;
        $clients->workplace = $workplace;
        $clients->save();

        return redirect()->action('ClientController@list')->withInput();
    }
}