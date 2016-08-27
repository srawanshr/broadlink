<?php
namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'no-reply@broadlink.com.np';

    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;

    protected $bcc;

    /**
     * The subject of the email.
     *
     * @var string
     */
    protected $subject;

    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The images associated with the view for the email.
     *
     * @var array
     */
    protected $images = [];

    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;

        $this->images = [
            'logo' => public_path()."/assets/img/logo_100x100.png",
            'facebook' => public_path()."/assets/img/facebook.png",
            'twitter' => public_path()."/assets/img/twitter.png",
            'google' => public_path()."/assets/img/google-plus.png"
        ];
    }

    /**
     * Deliver the email confirmation.
     *
     * @param  FreeDns $freeDns
     * @return void
     */
    public function sendInvoiceMailTo(User $user)
    {
        return true;
        $images = $this->images;
        $this->to = $user->email;
        $this->view = 'emails.invoice';
        $this->data = compact('freeDns', 'images');
        $this->subject = 'Purchase Successful';
        $this->bcc = ['sales@broadlink.com.np'];
        $this->deliver();
    }

    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            if(!empty($this->bcc))
                $message->bcc($this->bcc);
            $message->from($this->from, 'AccessWorld Tech.');
            $message->subject($this->subject);
            $message->to($this->to);
        });
    }
}