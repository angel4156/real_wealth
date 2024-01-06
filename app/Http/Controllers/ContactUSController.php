<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\ContactUS;
use Illuminate\Http\Request;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUSController extends Controller
{
    //
//     public function contactUS()
//    {
//        return view('email');
//    }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function contactUSPost(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);
    //    ContactUS::create($request->all());
        // dd(config('mail'));
    //    Mail::to($request->get('email'))->send(new ContactUsMail($request->all()));
    Mail::to('georgesteven0121@gmail.com')
    ->send(new ContactUsMail($request->all(), [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => 'georgesteven0121@gmail.com',
        'password' => 'your_mail_password',
        'encryption' => 'tls',
    ]));

    // try {
    //     Mail::to($request->get('email'))->send(new ContactUsMail($request->all()));
    // } catch (\Exception $e) {
    //     dd('ERROR!!!!!!!!!!!!');
    //     // Log or handle the exception as needed
    //     // return back()->with('error', 'Error sending email. Please try again later.');
    // }
    
    //    $from_email = $request->get('email');
    //    Mail::send('email',
    //         array(
    //             'name' => $request->get('name'),
    //             'email' => $request->get('email'),
    //             'user_message' => $request->get('message')
    //         ), function($message) use ($request)
    //     {
    //         // $message->from($request->get('email'));
    //         $message->from('georgesteven0121@gmail.com');
    //         $message->to('georgesteven0121@gmail.com', 'george steven')->subject('Contact by Email');
    //     });
       return back()->with('success', 'Thanks for contacting us!');
        // return view('Thanks!');
   }
}
