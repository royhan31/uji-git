<?php

namespace App\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
class VerifyUserEmail extends VerifyEmailBase
{
  protected function verificationUrl($notifiable){
    return URL::temporarySignedRoute(
    'verificationUser.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
  );
  }

  public function toMail($notifiable)
  {
      $verificationUrl = $this->verificationUrl($notifiable);

      if (static::$toMailCallback) {
          return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
      }

      return (new MailMessage)
          ->subject(Lang::getFromJson('Verifikasi Email'))
          ->line(Lang::getFromJson('Silahkan klik tombol Verifikasi Email'))
          ->action(Lang::getFromJson('Verifikasi Email'), $verificationUrl)
          ->line(Lang::getFromJson('Terima kasih telah menggunkan aplikasi kami'));
  }

}
