<?php

/**
 * This a basic PageController for your project
 *
 * Take a look at:
 * Liquidfish\Larafish\Page\Controller
 *
 * You can override functionality by changing the index() method
 */

class PageController extends Liquidfish\Larafish\Page\Controller {

	public $layout = 'layout';


	public function logout()
	{

		Auth::logout();
        Session::flush();
        return Redirect::route('/');
	}


}