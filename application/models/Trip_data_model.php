<?php
/**
 * Created by IntelliJ IDEA.
 * User: urandu
 * Date: 10/8/16
 * Time: 2:00 PM
 */

class Trip_data_model extends CI_Model{


    public function new_trip_data($trip_id,$longitude,$latitude)
    {

        $data=array(
            "trip_id"=>$trip_id,
            "longitude"=>$longitude,
            "latitude"=>$latitude
        );
        
    }



}