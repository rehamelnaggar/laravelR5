<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Client;
use App\Mail\ContactClient;

class MyController extends Controller
{
public function receiveData(Request $request){
        $lname = $request->lname;
        return view('test1', compact('fname', 'lname'));
    }

    public function generalMail(){
        $data = Client::findOrFail(1)->toArray();
        $data['theMessage'] = 'message data is here';
        Mail::to($data['email'])->send( 
            new DemoMail($data)
        );
        return "mail sent!";
    }

    public function myVal(){
        // session()->put('test','My first session');
        session()->flash('test1','My first session');
        return 'Session Created';
    }

    public function restoreVal(){
        return 'My Session value is: ' . session('test1');
    }

    public function deleteVal(){
        // session()->forget('test');
        session()->flush();
        return 'Session removed';
    }

    public function sendClientMail(){
        $data = Client::findOrFail(1)->toArray();
        $data['theMessage'] = 'My message';
        Mail::to($data['email'])->send( 
            new ContactClient($data)
        );
        return "mail sent!";
    }
}