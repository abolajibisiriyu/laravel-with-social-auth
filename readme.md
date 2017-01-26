# Laravel Project With Social Media Authentication

## Introduction

* * *

This Laravel project is to serve as a starting point for developers who want some form of Social Media Authentication funtionality in their application. This project uses the [Laravel Socialite](https://github.com/laravel/socialite) Package to handle Social Media Authentication. The avaliabale Providers are Facebook, Twitter and Google. More to come. Live Example [Here!](http://laravel-app-with-social-auth.herokuapp.com)

## Usage

* * *

*   Create an app on the available providers developers page. checkout how to [Facebook](https://www.google.com.ng/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=0ahUKEwjQ-M-bkuDRAhUF5xoKHQaCAEUQFggbMAE&url=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fapps%2Fregister&usg=AFQjCNGQyFFVdctoHkw6tgfK5x2ncUQFMA&sig2=a3Aam-AAcrrRXxl79vbRzg&bvm=bv.145063293,d.ZGg), [Twitter](https://www.google.com.ng/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=0ahUKEwiaq7CrkuDRAhXENhoKHZEDCp4QFghRMAw&url=https%3A%2F%2Fiag.me%2Fsocialmedia%2Fhow-to-create-a-twitter-app-in-8-easy-steps%2F&usg=AFQjCNGnNhS2WiUqdCqQ3xFsDWINMKypcg&sig2=GcZUrJ7p-5pYjMbnOidxIw&bvm=bv.145063293,d.ZGg), [Google](https://www.google.com.ng/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=0ahUKEwi8iLrCkuDRAhXEHxoKHbNjCv0QFggYMAA&url=https%3A%2F%2Fdevelopers.google.com%2Fidentity%2Fsign-in%2Fweb%2Fdevconsole-project&usg=AFQjCNGMuWIhZU95mhJ4PR_QIcoj33Lmvg&sig2=iY6GaROWtYqTgSGy26RSJA&bvm=bv.145063293,d.ZGg).
*   Get the credentials and put them in the respective field in the `.env` file.

    <pre>                FACEBOOK_APP_ID=
                    FACEBOOK_APP_SECRET=
                    FACEBOOK_APP_REDIRECT=
                    TWITTER_APP_ID=
                    TWITTER_APP_SECRET=
                    TWITTER_APP_REDIRECT=
                    GOOGLE_APP_ID=
                    GOOGLE_APP_SECRET=
                    GGOGLE_APP_REDIRECT=
                </pre>

*   Or in the config/services.php file

    <pre>                'facebook' => [
                        'client_id' => env('FACEBOOK_APP_ID'), // your app id
                        'client_secret' => env('FACEBOOK_APP_SECRET'), // your app secret
                        'redirect' => env('FACEBOOK_APP_REDIRECT'),
                    ],

                    'twitter' => [
                        'client_id' => env('TWITTER_APP_ID'), // your app id
                        'client_secret' => env('TWITTER_APP_SECRET'), // your app secret
                        'redirect' => env('TWITTER_APP_REDIRECT'),
                    ],

                    'google' => [
                        'client_id' => env('GOOGLE_APP_ID'), // your app id
                        'client_secret' => env('GOOGLE_APP_SECRET'), // your app secret
                        'redirect' => env('GOOGLE_APP_REDIRECT'),
                    ],
                </pre>

*   **Note:** The redirect should be the same as that registered on the provider app page.
*   The web routes for the social authentication.

    <pre>                Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
                    Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
                </pre>

*   Run the Artisan Auth command.

    <pre>                php artisan make:auth
                </pre>

*   Edit the migration to your needs and migrate.

    <pre>                php artisan migrate
                </pre>

## Todo

* * *

*   Add More Providers like GitHub, BitBucket.
*   Ability to toggle specific providers based on needs.

## Contributing

* * *

Please feel free to fork or send a pull request, to make this repository better. It would be highly appreciated.

## Support Me

* * *

Kindly show your support by giving this repo a star, share everywhere. And [Follow me on Twitter!](https://twitter.com/abolaji_dev)

Thank You.

## License

* * *

This is licensed under the MIT License (MIT). Please see [License File](https://github.com/abolajibisiriyu/laravel-with-social-auth/blob/master/LICENSE.md) for more information.