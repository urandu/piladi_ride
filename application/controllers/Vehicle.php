<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {


	public function index()
	{
		//$this->load->view('welcome_message');
        echo("Welcome to the trip vehicle");
	}

    public function new_vehicle()
    {

       $vehicle_type=$this->input->post("vehicle_type");
       $vehicle_alias=$this->input->post("vehicle_alias");
       $vehicle_registration=$this->input->post("vehicle_registration");
       $vehicle_description=$this->input->post("vehicle_description");

        $this->load->model("vehicle_model");
        $vehicle_id=$this->vehicle_model->new_vehicle($vehicle_type,$vehicle_alias,$vehicle_registration,$vehicle_description);
        echo(json_encode(array(
            "status"=>"ok",
            "vehicle_id"=>$vehicle_id
        )));


    }





    public function get_vehicle()
    {
        $vehicle_id=$this->input->post("vehicle_id");
        $this->load->model("vehicle_model");
        $vehicle=$this->vehicle_model->get_vehicle($vehicle_id);

        if($vehicle!==false)
        {
            echo(json_encode(array(
                "status"=>"ok",
                "vehicle"=>$vehicle
            )));
        }
        else
        {
            echo(json_encode(array(
                "status"=>"error",
                "vehicle"=>"vehicle not found"
            )));
        }

    }


}
