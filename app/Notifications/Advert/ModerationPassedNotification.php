<?php

namespace App\Notifications\Advert;

use App\Entity\Adverts\Advert\Advert;
use App\Notifications\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ModerationPassedNotification extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $advert;

    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }

    public function via($notifiable)
    {
        return ['mail', SmsChannel::class];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Модерация пройдена')
            ->greeting('Привет!')
            ->line('Ваш продукт успешно прошел модерацию.')
            ->action('Посмотреть продукт', route('adverts.show', $this->advert))
            ->line('Спасибо за использование нашего приложения!');
    }

    public function toSms(): string
    {
        return 'Ваш продукт успешно прошел модерацию.';
    }
}
