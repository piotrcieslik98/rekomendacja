<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends BaseResetPasswordNotification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Zresetuj swoje hasło')
            ->greeting('Witaj!')
            ->line('Otrzymaliśmy Twoją prośbę o zresetowanie hasła.')
            ->action('Zresetuj hasło', $this->resetUrl($notifiable))
            ->line('Jeśli nie prosiłeś o zresetowanie hasła, zignoruj tę wiadomość.')
            ->salutation('Link jest ważny 60 minut');
    }

    protected function resetUrl($notifiable)
    {
        return url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
