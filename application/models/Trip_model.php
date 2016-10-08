<?php
/**
 * Created by IntelliJ IDEA.
 * User: urandu
 * Date: 10/8/16
 * Time: 2:00 PM
 */

class Trip_model extends CI_Model{


    public function new_trip($vehicle_id,$user_id,$status=1)
    {
        /*
         * status==1 if trip is in progress,
         * status==2 if trip has ended
        */
        $data=array(
            "vehicle_id"=>$vehicle_id,
            "user_id"=>$user_id,
            "status"=>$status
        );

        $this->db->insert("trip",$data);
        return $this->db->inser_id();

    }

    public function end_trip($trip_id)
    {

        $data=array(
            "end_time"=>date("Y-m-d H:i:s"),
            "status"=>"1"
        );

        $this->db->where("trip_id",$trip_id);
        $this->db->update("trip",$data);
        return true;

    }

    public function get_all_active_trips()
    {
        $this->db->where("status","1");
        $result=$this->db->get("trip");
        return $result->result();
    }

    public function get_user_trips($user_id)
    {
        $this->db->where("user_id",$user_id);
        $result=$this->db->get("trip");
        return $result->result();
    }


    public function get_all_trips()
    {

        $result=$this->db->get("trip");
        return $result->result();
    }


}