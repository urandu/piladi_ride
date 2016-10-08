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

        $this->db->insert("trip_data",$data);
        return $this->db->insert_id();

    }

    public function get_trip_data($trip_id)
    {
        $this->db->where("trip_id",$trip_id);
        $result=$this->db->get("trip_data");

        if($result->num_rows()>0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }

    }



}