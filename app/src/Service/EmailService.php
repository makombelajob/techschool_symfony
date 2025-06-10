<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;


class EmailService
{
    public function __construct(private MailerInterface $mailer) {}

    // Logique d'envoie de mail
    public function send(string $from, string $to, string $subject, string $template, array $context = []): void
    {
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate("emails/$template.html.twig")
            ->context($context);

        $this->mailer->send($email);
    }
}
