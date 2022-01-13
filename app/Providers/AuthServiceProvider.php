<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        ResetPassword::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->subject(Lang::get('Redefinição de senha'))
                ->greeting('Olá!') 
                ->line(Lang::get('Você está recebendo este email porque nós recebemos uma solicitação de redefinição de senha da sua conta.'))
                ->action('Redefinir senha', 'http://autenticacao.test/reset-password/'.$url)
                ->line(Lang::get('Esse link de redefinição de senha expirará em :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                ->line(Lang::get('Se você não solicitou uma redefinição de senha, ignore esta mensagem.'));
        });

    }
}
