<?php 

	class SignupController extends BaseController {

		public function create()
		{
			$input = Input::all();


			try {
				
				$validator = Validator::make(
					$input,
					array(
						'first_name' => 'required',
						'last_name' => 	'required',
						'email' =>	'required|email',
						'age' =>	'required',
						'password'	=>	'required'
						)
					);

				if ($validator->fails()) 
				{
					Session::put('response','sorry, you must be 21 or over');
					return Redirect::back();
				}
				else{



						$password = Hash::make($input['password']);

						
						$user = new Users;


						$user->first_name = $input['first_name']; 
						$user->last_name = $input['last_name'];
						$user->email = $input['email'];
						$user->password = $password;

						$user->save();
					
						// dd($user);
						$email = $user['email'];
						$password = $user['password'];


						// $attempt = Auth::attempt(array('email' => $email, 'password', $password));
						// 
						
						// var_dump($user);
						// die();

						session_start();

						$_SESSION['first_name'] = $user->first_name;
						$_SESSION['id'] = $user->id;

						Mail::send('emails.newuser', $input, function($message) use ($input)
							{
							  $message->to($input['email']);
							  $message->from('dan@ittybam.com');
							  $message->subject("Welcome!");

							});
						

						return Redirect::to('/dashboard')->with('user', $user);


						// if ($attempt) 
						// {
						// 	return Redirect::to('/profile');
						// 	# code...
						// }
						// else{
						// 	return "something wrong";
						// 	die();
						// }

						// var_dump($user);
						// die();
						


						

				}



			} catch (Exception $ex) {
				
			}

		}

		public function signin()
		{
			if (Auth::guest()) {
				echo"guest";
			}
			else{
				echo "user";
			}

			echo "sign in";
			die();
			$email = $input['email'];
			$password = $input['password'];

			if (Auth::attempt(array('email'=>$email, 'password'=>$password))) 
			{
				$user = Users::where('email','=',$email)->get();
				return Redirect::intended('profile')->with('user', $user);
			}


		}

		public function login()
		{
			
			#
			##
			#
			#    SET SESSION VARIABLEAS?
			#
			#


			$input = Input::all();

			$email = $input['email'];
			$password = $input['password'];

			$attempt = Auth::attempt(array('email'=>$email, 'password'=>$password),true);
			
			if ($attempt) {
				$user = Users::find($email);
				return View::make('user.dashboard')->with('user', $user);
				}

			else{
				return "false";
				die();
			}


		}

	}

  ?>