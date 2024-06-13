<?php

namespace App\Http\Controllers;

use App\Mail\ContactClient;
use Database\Seeders\ClientsTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Client;
class MyController extends Controller
{
    public function my_data(){
        return view('test');
    }

    public function receiveData(Request $request){
        $fname = $request->fname;
        $lname = $request->lname;
        return view('test1', compact('fname', 'lname'));
    }
    
    public function myVal(){
        //session()->put('test','My first session');
        session()->flash('test1','My first session');
        return 'session Created';
    }

    public function restoreVal(){
        return 'My session value is: ' . session('test1');
    }

    public function deleteVal(){
        //session()->forget('test')
        session()->flush();
        return 'Session removed ';
    }

    public function sendClientMail(){
        $data = Client::findOrFail()->toArray();
        $data['theMessage'] = 'My message';
        Mail::to($data['email'])->send(
            new ContactClient($data)
        );
        return "mail sent!";
    }
}