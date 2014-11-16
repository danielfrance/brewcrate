<?php

class EmailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

		public function newsletter()
	{
		$input = Input::all();
		$response = array('success' => false);

		
		try {


			$validator = Validator::make(
				$input,
				array(
					'newsletter' => 'required'
					)
				);
			if ($validator->fails()) {
				$response['message'] = $validator->messages();
				return ($response);
			}
            if(!empty($input['honeypot']))
            {
                $response['message'] = 'Bad Bot.  No form for you';
                return Response::json($response);
            }
			else{
				//validation passed
				

				$signup = new Newsletter;
				$signup->email = $input['newsletter'];
				$signup->save();

				Mail::send('emails.newsletter', $input, function($message) use ($input) {
				  $message->to('dan@ittybam.com', 'BrewCraft Newsletter');
				  $message->from($input['email']);
				  $message->subject("BrewCraft Newsletter");

				});

				$response['success'] = true;
			}


		  } 
		  catch (Exception $ex) {
			$response['message'] = $ex->getMessage();
			}

		return Response::json($response);
		

	} //end newsletter

}
