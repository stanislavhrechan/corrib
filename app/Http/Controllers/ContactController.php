<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'gdpr' => 'accepted',
        ]);

        Mail::send([], [], function ($message) use ($request) {
            $message->to('your@email.com')
                ->subject('Nová správa z formulára')
                ->html("
                    <h3>Nová správa</h3>
                    <p><b>Meno:</b> {$request->name}</p>
                    <p><b>Email:</b> {$request->email}</p>
                    <p><b>Tel:</b> {$request->phone}</p>
                    <p><b>Správa:</b><br>{$request->message}</p>
                ");
        });

        return back()->with('success', 'Správa bola odoslaná!');
    }
}
