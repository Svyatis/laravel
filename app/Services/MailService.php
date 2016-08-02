<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 25.07.16
 * Time: 21:49
 */

namespace App\Services;

use Mail;

class MailService
{
    /**
     * @param $contactFormRequest
     */
    public function feedbackMail($contactFormRequest)
    {
        $view       = 'emails.feedback';
        $data       = [ 'name'          => $contactFormRequest->get('name'),
                        'email'         => $contactFormRequest->get('email'),
                        'user_message'  => $contactFormRequest->get('message')
                        ];
        $to         = env('MAIL_USERNAME');
        $from       = 'admin@svyatis.com';
        $subject    = 'Feedback from svyatis.com';
        Mail::queue($view, $data, function($message) use ($to, $from, $subject) {
            $message->to($to)
                    ->from($from)
                    ->subject($subject);
        });
    }

    /**
     * @param $data
     */
    public function feedbackJSONMail($data)
    {
        $view       = 'emails.feedback';
        $to         = env('MAIL_USERNAME');
        $from       = 'admin@svyatis.com';
        $subject    = 'Feedback from svyatis.com';
        Mail::queue($view, $data, function($message) use ($to, $from, $subject) {
            $message->to($to)
                    ->from($from)
                    ->subject($subject);
        });
    }
}
