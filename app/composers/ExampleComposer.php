<?php

class ExampleComposer {
	
	public function composer($view)
	{
		$view->with('key','value');
	}

}