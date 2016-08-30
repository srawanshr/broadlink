<?php
namespace App\Mailers;

use App\Models\Invoice;
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

    /**
     * The bcc recipient of the email.
     *
     * @var string
     */
    protected $bcc = [];

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
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Deliver the email confirmation.
     *
     * @param Invoice $invoice
     * @return bool
     */
    public function sendInvoiceMail(Invoice $invoice)
    {
        $this->to = $invoice->user->email;
        $this->view = 'emails.invoice';
        $this->data = compact('invoice');
        $this->subject = '[Broadlink] Invoice';
        $this->bcc = setting('email');
        $this->deliver();
    }

    /**
     * @param $data
     */
    public function sendOrderNotification($data)
    {
        $this->to = setting('email');
        $this->view = 'emails.inquiry';
        $this->data = compact('data');
        $this->subject = '[Broadlink] Service Inquiry';
        $this->deliver();

        $this->to = $data['email'];
        $this->view = 'emails.inquiry-confirmation';
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
            $message->from($this->from, 'AccessWorld Tech.');
            $message->subject($this->subject);
            $message->to($this->to);
            $message->bcc($this->bcc);
        });
    }
}