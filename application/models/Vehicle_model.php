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


}