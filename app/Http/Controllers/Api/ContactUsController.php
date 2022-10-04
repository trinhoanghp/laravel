<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ContactUsController extends Controller
{
   public function sendContact(Request $request)
   {    
      $name = $request->name;
     Mail::send('admin.email.contact',compact('request'),function($email) use($name) {
         $email->to('shop.suruchi@gmail.com')->subject('Customer Contact');
         $email->from('trinhcvdn@gmail.com',$name);
      });
   }
   public function sendOrder(Request $request)
   {    
   //   Mail::send('admin.email.order',compact('request'),function($email) {
   //       $email->to('shop.suruchi@gmail.com')->subject('Customer Contact');
   //    });
   }
}
