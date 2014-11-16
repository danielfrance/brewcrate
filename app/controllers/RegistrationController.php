<?php

// use Acme\Forms\RegistrationForm;


class RegistrationController extends BaseController {

	/**
	 *
	 * @var RegistrationForm
	 * 
	 */
	

	/**
	 * Display a listing of the resource.
	 * GET /registration
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'Hello';
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();


		try {
			
			$validator=Validator::make(
				$input,
				array(
					'first_name' => 'required',
					'last_name' => 'required',
					'email' => 'required',
					'password' => 'required',
					
					)
				);
			if ($validator->fails()) {
				$response['message'] = $validator->messages();
				return "something is wrong";
			}

			else{
				$password = Hash::make($input['password']);

				$user = new Users;

				$user->first_name = $input['first_name'];
				$user->last_name = $input['last_name'];
				$user->email = $input['email'];
				$user->password = $password;

				$user->save();

				return Redirect::to('/profile');
			}

		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}


	}

	/**
	 * Display the specified resource.
	 * GET /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /registration/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// View::make('registration.edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}