<?php

namespace Marshmallow\Authenticator\Instagram\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Marshmallow\Authenticator\Models\AuthenticatorToken;

class InstagramAuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:instagram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a long-lift token from Instagram';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client_id = config('authenticator.instagram.client_id');
        $client_secret = config('authenticator.instagram.client_secret');
        $redirect_uri = config('authenticator.instagram.redirect_uri');

        $this->info('Surf to the URL below:');
        $this->info("https://api.instagram.com/oauth/authorize?client_id={$client_id}&redirect_uri={$redirect_uri}&scope=user_media,user_profile&response_type=code&state=1");

        $this->newLine();
        $redirected_to = $this->ask('Pasted the full redirected url here:');
        $code = $this->getCodeFromUrl($redirected_to);

        $response = Http::asForm()->post('https://api.instagram.com/oauth/access_token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirect_uri,
            'code' => $code,
        ]);

        $access_token = $response->json()['access_token'];

        $this->info('Access Token:');
        $this->info($access_token);
        $this->newLine();

        $response = Http::get('https://graph.instagram.com/access_token', [
            'grant_type' => 'ig_exchange_token',
            'client_secret' => $client_secret,
            'access_token' => $access_token,
        ]);

        $this->info('Long Lifed Token:');
        $this->info($response->json()['access_token']);
        $this->newLine();

        AuthenticatorToken::updateOrCreate([
            'name' => 'Instagram Auth',
            'slug' => 'instagram-auth',
        ], [
            'access_token' => $access_token,
            'long_lived_token' => $response->json()['access_token'],
            'expires_at' => now()->addSeconds($response->json()['expires_in']),
        ]);

        $this->newLine();
        $this->info('Token stored in the database.');

        return 0;
    }

    protected function getCodeFromUrl($url)
    {
        $parts = explode('?', $url);
        $parts = explode('&', $parts[1]);
        foreach ($parts as $part) {
            $params = explode('=', $part);
            if ($params[0] == 'code') {
                return $params[1];
            }
        }
    }
}
