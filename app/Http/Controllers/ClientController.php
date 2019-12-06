<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use Illuminate\Http\Request as RequestConcrete;

use Illuminate\Support\Facades\DB;

use App\Client;

use App\Device;

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
    
    public function detailclient($id){
        $client = Client::find($id);
        return view('detailclient')->with('client', $client);        
                //return view('detailclient');
    }
    
    public function savedevice(RequestConcrete $request, $id){

        // $name = Request::input('name');
        // $type = Request::input('type');
        // $device = Request::input('device');

        $request['client_id'] = $id;
        
        // dd(
        //     $request->all()
        // );

        

        $devices = Device::create($request->all());
        
        // $devices = new Device();
        // $devices->name = $name;
        // $devices->type = $type;
        // $devices->device = $device;
        // $devices->client_id = $id;
        // // dd($devices);
        // $devices->save();

        if (!$devices) {
            return redirect()->back()->withInput();
        }

        return redirect()->back();
    }

    public function edit($id){
        $clients = Client::find($id);
        if (empty($clients)){
            return 'Cliente não existe';
            } else {
                return view('edit')->with('clients', $clients);
        }
    }

    public function editdevice($id){
        $device = Device::find($id);
        if (empty($device)){
            return 'Dispositivo não existe';
            } else {
                return view('editdevice')->with('device', $device);
        }
    }    

    public function delete($id){
        $clients = Client::find($id);
        $clients->delete();
        
        return redirect()->action('ClientController@list');
    }

    public function deletedevice($id){
        $device = Device::find($id);
        $device->delete();
        
        return redirect()->back();
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

    public function updatedevice(RequestConcrete $request, $id){

        is_null($request->enable) ? $request['enable'] = false : $request['enable'] = true;
        $device = Device::find($id);
        $device->fill($request->all());
        $device->save();

        return redirect()->action('ClientController@detailclient', $device->client_id);
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