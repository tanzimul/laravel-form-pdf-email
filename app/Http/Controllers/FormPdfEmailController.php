<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;
use env;

class FormPdfEmailController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->all();

        $data['replyTo'] = env('MAIL_FROM_ADDRESS');
        $data['replyToName'] = env('MAIL_FROM_NAME');

        $pdf = PDF::loadView('pdf.pdf', compact('data'));
        try {
            Mail::send('mails.mail', compact('data'), function ($message) use ($data, $pdf) {
                $message
                    ->to($data['email'], $data['name'])
                    ->replyTo($data['replyTo'], $data['replyToName'])
                    ->subject($data['subject'])
                    ->attachData($pdf->output(), "attachment.pdf");
            });
        } catch (JWTException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        if (Mail::failures()) {
            return redirect()->back()->with('error', 'Error sending mail');
        } else {
            return redirect()->back()->with('success', 'Email sent successfully');
        }
        
    }
}
