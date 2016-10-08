<?php
/**
 * Created by IntelliJ IDEA.
 * User: urandu
 * Date: 10/8/16
 * Time: 2:00 PM
 */

class Vehicle_model extends CI_Model{


    public function new_vehicle($vehicle_type,$vehicle_alias,$vehicle_registration,$vehicle_description)
    {

        $data=array(
            "vehicle_type"=>$vehicle_type,
            "vehicle_alias"=>$vehicle_alias,
            "vehicle_registration"=>$vehicle_registration,
            "vehicle_description"=>$vehicle_description
        );

        $this->db->insert("vehicle",$data);
        return $this->db->insert_id();

    }

    public function get_vehicle($vehicle_id)
    {
        $this->db->where("vehicle_id",$vehicle_id);
        $result=$this->db->get("vehicle");

        if($result->num_rows()>0)
        {
            return $result->result()[0];
        }
        else
        {
            return false;
        }

    }

    public function get_all_vehicles()
    {

        $result=$this->db->get("vehicle");

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