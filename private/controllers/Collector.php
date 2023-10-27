<?php
class collector extends Controller
{
	function index()
	{
		// code...
		$this->view('Collector');
	}

    function table(){
        $this->view('pickup table');
    }

    function details(){
        $this->view('pickup details');
    }
}
