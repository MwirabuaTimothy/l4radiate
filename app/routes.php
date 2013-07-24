<?php
require_once("config/hybridauth.php");


Route::get('social/auth', array("as" => "hybridauth", function($action = "")
{
	// check URL segment
	if ($action == "auth") {
		// process authentication
		try {
			Hybrid_Endpoint::process();
		}
		catch (Exception $e) {
			// redirect back to http://URL/social/
			return Redirect::route('hybridauth');
		}
		return;
	}
	try {
		// create a HybridAuth object
		$socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
		// authenticate with Google
		$provider = $socialAuth->authenticate("google");
		// fetch user profile
		$userProfile = $provider->getUserProfile();
	}
	catch(Exception $e) {
		// exception codes can be found on HybBridAuth's web site
		return $e->getMessage();
	}
	// access user profile data
	echo "Connected with: <b>{$provider->id}</b><br />";
	echo "As: <b>{$userProfile->displayName}</b><br />";
	echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

	// logout
	$provider->logout();
}));
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Account Routes
|--------------------------------------------------------------------------
*/

Route::controller('users', 'UsersController');
Route::get('edituser', 'UsersController@getEdit');
Route::resource('users/index', 'UsersController');
Route::resource('login', 'UsersController');
Route::resource('register', 'UsersController');
Route::resource('courses', 'CoursesController');
Route::resource('profiles', 'ProfilesController');

/*
|--------------------------------------------------------------------------
| Application Search Routes
|--------------------------------------------------------------------------
*/
Route::get('oauth/{provider}', 'Oauth2Controller@getIndex');

/*
|--------------------------------------------------------------------------
| Application Search Routes
|--------------------------------------------------------------------------
*/
Route::get('howitworks', function(){ return View::make('howitworks');});
Route::get('privacypolicy', function(){ return View::make('privacypolicy');});
Route::get('termsofuse', function(){ return View::make('termsofuse');});
Route::get('customerservice', function(){ return View::make('customerservice');});
Route::get('template', function(){return View::make('template');});
Route::get('blog', function(){ return View::make('blog');});
Route::get('contactus', function(){ return View::make('contactus');});

Route::resource('forums', 'ForumsController');
Route::resource('colleges', 'CollegesController');
Route::resource('bookshelves', 'BookshelvesController');
Route::resource('wishlists', 'WishlistsController');

Route::get('search','SearchController@search');
Route::get('ssearch','SearchController@ssearch');


Route::controller('/', 'HomeController');




Route::resource('profiles', 'ProfilesController');