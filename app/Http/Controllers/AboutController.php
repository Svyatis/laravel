<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;

class AboutController extends Controller
{
    /**
     * Function rendered ContactUs form
     * 
     * @return ContactUs view
     */
    public function create()
    {
        return view('About.contactUs');
    }

    /**
     * Function stored users information
     *
     * @return Sending users data and inform the user of a successful form submission
     */
    public function store(ContactFormRequest $request)
    {
        \Mail::send('About.email',
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ], function($message)
            {
                $message->from('admin@svyatis.com');
                $message->to('svyat.php@gmail.com', 'Admin')->subject('Feedback');
            });

        return \Redirect::route('contact')->with('message', 'Your message was successfully submit! Thanks for contacting us!');
    }

}
