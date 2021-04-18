<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function create()
	{
		$this->load->model('UserModel');
		$countries = $this->UserModel->getCountry();
		// echo "<pre>";		print_r($countries);		exit();
		$data = [];
		$data['countries'] = $countries;
        $this->load->view('create', $data);
	}

	public function getState()
	{
		$this->load->model('UserModel');
		$country_id = $this->input->post('country_id');
		$states = $this->UserModel->getStatesOfCountry($country_id);
		//echo "<pre>";		print_r($states);		exit();
		$data = [];
		$data['states'] = $states;
		$statesString = $this->load->view('stateSelect', $data, true);
		// echo $statesString = $this->load->view('stateSelect', $data, true);

		$response['states'] = $statesString;	
		// $response['statesString'] = $statesString;//it not show the states
		echo json_encode($response);
	}
}
