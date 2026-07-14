<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactForm extends Controller
{
    public function contact_send(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:30',
            'message' => 'required|string',
        ]);
        Mail::to('info@benard.sk')
        ->send(
            (new ContactMail($data))
                ->replyTo(
                    $data['email'],
                    $data['name']
                )
        );
        return back()->with('success', 'Správa bola odoslaná');
    }
}
