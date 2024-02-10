<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{
    //
    public function index()
    {
        $message = Message::all();
        return view('admin.messages', compact('message'));
    }
    public function showmessage(string $id)
    {
        $message = Message::findOrFail($id);
        return view('admin.showmessage', compact('message'));
    }

    public function deletemessage(string $id)
    {
        Message::findOrFail($id)->delete();
        return redirect('/message');

    }
    public function sendmail()
    {
        $msg = Message::latest()->first();
        Mail::to('admin@gmail.com')->send(new ContactMail($msg));
        return redirect('/');
    }
    public function store(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->message = $request->message;
        $message->email = $request->email;
        $message->save();
        return redirect('/sendmail');
    }

    public function messageCount()
    {
        $user = auth()->user(); // Assuming Laravel's auth is used

        if ($user) {
            $unreadCount = $user->messages()->where('is_read', false)->count();
            return response()->json(['unreadCount' => $unreadCount]);
        }

        return response()->json(['unreadCount' => 0]);
    }



}
