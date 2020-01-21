<?php

namespace App\Http\Controllers;

use App\models\contactForm;
use Illuminate\Http\Request;
use App\mail\contactFormMail;
use Illuminate\support\Facades\Mail;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            ]);

        //Mail::to('storage.logs.job')->send(new contactFormMail($data));
        
        return redirect('/contact')->with('message', 'we\'ll be in touch');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(contactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(contactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactForm $contactForm)
    {
        //
    }
}
