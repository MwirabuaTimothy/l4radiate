<?php 

class Oauth2Controller extends BaseController
{

    namespace OAuth2\OAuth2;
    namespace OAuth2\Token_Access;
    namespace OAuth2\Exception as OAuth2_Exception;

    public function getIndex($provider) {


        $provider = OAuth2::provider($provider, array(
        'id' => '182024725307187',
        'secret' => '7812599b4ecfde73c953bfb051094e9c',
        ));

        if(! isset($_GET['code'])) {

            return $provider->authorize();

        }

        else
    {
        // Howzit?
        try
        {
            $params = $provider->access($_GET['code']);

                $token = new Token_Access(array(
                    'access_token' => $params->access_token
                ));
                $user = $provider->get_user_info($token);

            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
            echo "<pre>";
            var_dump($user);
        }

        catch (OAuth2_Exception $e)
        {
            show_error('That didnt work: '.$e);
        }
    }

    }


}