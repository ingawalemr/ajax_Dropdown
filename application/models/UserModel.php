<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function getCountry()
	{
		$countries = $this->db->get('countries')->result_array();
		return $countries;
		// return  $this->db->get('countries')->result_array();
	}

	public function getStatesOfCountry($country_id)
	{
		$this->db->where('country_id', $country_id);
		return $states= $this->db->get('states')->result_array();
	}
}
