<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 
class MailController extends Controller
{
    public function sendEmail()
    {
        $email = 'reham@gmail.com';
        $data = [
            'title' => 'Laravel 11 Mail sending to MailHog',
            'url' => 'https://blog.mindscms.com'
        ];
        
        Mail::to($email)->send(new SendMail($data));
  }
}
