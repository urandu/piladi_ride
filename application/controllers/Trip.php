<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {


	public function index()
	{
		//$this->load->view('welcome_message');
        echo("Welcome to the trip controller");
	}

    public function new_trip()
    {
        /*
         * status==1 if trip is in progress,
         * status==2 if trip has ended
        */
       $vehicle_id=$this->input->post("vehicle_id");
       $user_id=$this->input->post("user_id");

        $this->load->model("trip_model");
        $trip_id=$this->trip_model->new_trip($vehicle_id,$user_id);
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

    

}
