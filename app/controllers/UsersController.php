<?php

class UsersController extends AuthorizedController
{
	/**
	 * Let's whitelist all the methods we want to allow guests to visit!
	 *
	 * @access   protected
	 * @var      array
	 */
	protected $whitelist = array(
		'getLogin',
		'postLogin',
		'getRegister',
		'postRegister'
	);

	/**
	 * Main users page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getIndex()
	{
		// Show the page.
		//
		// return View::make('users/index')->with('users', Auth::user());
		return View::make('users/account')->with('users', Auth::user());
	}

	/**
	 *
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'firstname' => 'Required',
			'lastname'  => 'Required',
			'email'      => 'Required|Email|Unique:users,email,' . Auth::user()->email . ',email',
		);

		// If we are updating the password.
		//
		if (Input::get('password'))
		{
			// Update the validation rules.
			//
			$rules['password']              = 'Required|Confirmed';
			$rules['password_confirmation'] = 'Required';
		}

		// Get all the inputs.
		//
		$inputs = Input::all();

		// Validate the inputs.
		//
		$validator = Validator::make($inputs, $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Create the user.
			//
			$user =  User::find(Auth::user()->id);
			$user->firstname = Input::get('firstname');
			$user->lastname  = Input::get('lastname');
			$user->email      = Input::get('email');

			if (Input::get('password') !== '')
			{
				$user->password = Hash::make(Input::get('password'));
			}

			$user->save();

			// Redirect to the register page.
			//
			return Redirect::to('users')->with('success', 'Account updated with success!');
			// return Redirect::to('users')->with('success', 'Account updated with success!');
		}

		// Something went wrong.
		//
		return Redirect::to('users')->withInput($inputs)->withErrors($validator->messages());
	}

	/**
	 * Login form page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getLogin()
	{
		// Are we logged in?
		//
		if (Auth::check())
		{
			return Redirect::to('users');
		}

		// Show the page.
		//
		return View::make('users/login');
	}

	/**
	 * Login form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postLogin()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required'
		);

		// Get all the inputs.
		//
		$email    = Input::get('email');
		$password = Input::get('password');

		// Validate the inputs.
		//
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Try to log the user in.
			//
			if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{
				// Redirect to the users page.
				//
				// return Redirect::to('users')->with('success', 'You have logged in successfully');
				return Redirect::to('users')->with('success', 'You have logged in successfully');
			}
			else
			{
				// Redirect to the login page.
				//
				return Redirect::to('users/login')->with('error', 'Email/password invalid.');
			}
		}

		// Something went wrong.
		//
		return Redirect::to('users/login')->withErrors($validator);
	}

	/**
	 * User account creation form page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getRegister()
	{
		// Are we logged in?
		//
		if (Auth::check())
		{
			return Redirect::to('users');
		}

		// Show the page.
		//
		return View::make('users/register');
	}

	/**
	 * User account creation form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postRegister()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'firstname'            => 'required',
			'lastname'             => 'required',
			'email'                 => 'required|email|unique:users',
			'password'              => 'required|confirmed',
			'password_confirmation' => 'required'
		);

		// Validate the inputs.
		//
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Create the user.
			//
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname  = Input::get('lastname');
			$user->email      = Input::get('email');
			$user->password   = Hash::make(Input::get('password'));
			$user->save();

			// Redirect to the register page.
			//
			return Redirect::to('users/register')->with('success', 'Account created with success!');
		}

		// Something went wrong.
		//
		return Redirect::to('users/register')->withInput()->withErrors($validator);
	}

	/**
	 * Logout page.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function getLogout()
	{
		// Log the user out.
		//
		Auth::logout();

		// Redirect to the users page.
		//
		return Redirect::to('users/login')->with('success', 'Logged out with success!');
	}
}
