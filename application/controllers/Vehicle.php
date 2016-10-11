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
        /*
         * status==1 if trip is in progress,
         * status==2 if trip has ended
        */
       $vehicle_type=$this->input->post("vehicle_type");
       $vehicle_alias=$this->input->post("vehicle_alias");
       $vehicle_registration=$this->input->post("vehicle_registration");
       $vehicle_description=$this->input->post("vehicle_description");

        $this->load->model("vehicle_model");
        $trip_id=$this->vehicle_model->ew_vehicle($vehicle_type,$vehicle_alias,$vehicle_registration,$vehicle_description);
        echo(json_encode(array(
            "status"=>"ok",
            "trip_id"=>$trip_id
        )));


    }

    public function end_trip()
    {

        $trip_id=$this->input->post("trip_id");


        $this->load->model("trip_model");
        $this->trip_model->end_trip($trip_id);
        echo(json_encode(array(
            "status"=>"ok",
            "trip_id"=>$trip_id
        )));

    }

    public function new_trip_data()
    {

        $trip_id=$this->input->post("trip_id");
        $longitude=$this->input->post("longitude_id");
        $latitude=$this->input->post("latitude_id");


        $this->load->model("trip_data_model");
        $trip_data_id=$this->trip_data_model->new_trip_data($trip_id,$longitude,$latitude);
        echo(json_encode(array(
            "status"=>"ok",
            "trip_data_id"=>$trip_data_id
        )));

    }



    public function get_trip_data()
    {
        $trip_id=$this->input->post("trip_id");
        $this->load->model("trip_data_model");
        $trip_data=$this->trip_data_model->new_trip_data($trip_id);

        if($trip_data!==false)
        {
            echo(json_encode(array(
                "status"=>"ok",
                "trip_data"=>$trip_data
            )));
        }
        else
        {
            echo(json_encode(array(
                "status"=>"error",
                "trip_data"=>"no data"
            )));
        }

    }


}
