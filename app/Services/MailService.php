<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 25.07.16
 * Time: 21:49
 */

namespace App\Services;

use Mail;
use App\Http\Requests\ContactFormRequest;

class MailService
{
    /**
     * @var ContactFormRequest
     */
    private $request;

    /**
     * MailService constructor.
     * @param ContactFormRequest $request
     */
    public function __construct(ContactFormRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Feedback form
     */
    public function feedbackMail()
    {
        $view       = 'emails.feedback';
        $data       = [ 'name'          => $this->request->get('name'),
                        'email'         => $this->request->get('email'),
                        'user_message'  => $this->request->get('message')
                        ];
        $to         = env('MAIL_USERNAME');
        $from       = 'admin@svyatis.com';
        $subject    = 'Feedback from svyatis.com';
        Mail::send($view, $data, function($message) use ($to, $from, $subject) {
            $message->to($to)
                    ->from($from)
                    ->subject($subject);
        });
    }
}
