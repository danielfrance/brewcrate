<?php

/**
 * This a basic PageController for your project
 *
 * Take a look at:
 * Liquidfish\Larafish\Page\Controller
 *
 * You can override functionality by changing the index() method
 */

class PageController extends \Controller {

	public $layout = 'layout';


	public function index()
	{
		return View::make('home');
	}

	public function logout()
	{

		Auth::logout();
        Session::flush();
        return Redirect::route('/');
	}

	public function signup()
	{
		return View::make('signup');

	}
	public function signin()
	{
		return View::make('signin');

	}
	public function beer()
	{
		return View::make('beer_profile');

	}
	public function dashboard()
	{

		return View::make('user.dashboard');
			
	}

	public function profile()
	{

		return View::make('user.profile');

	}

	public function upcoming()
	{

		return View::make('user.upcoming-crate');

	}

	public function instant()
	{
		return View::make('user.instant-crate');

	}



}