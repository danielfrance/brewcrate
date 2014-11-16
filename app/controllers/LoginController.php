<?php 

class LoginController extends BaseController {

	public function getIndex()
	{
		$this->layout->title = 'Login';
		$this->layout->page = 'login';
		$this->layout->yield = \View::make('login');
	}

	public function postIndex()
	{
		$userdata = array(
			'username' => \Input::get('username'),
			'password' => \Input::get('password')
		);
	    if (\Auth::attempt($userdata,true)){
	    	return \Redirect::intended('/');
	    } else {
	        return \Redirect::to('/login')->with('message', 'Login bad');
	    }
	}
	
	public function logout()
	{
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
	}

}