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
        return $this->db->last

    }
    public function end_trip($trip_id,$end_time)
    {

    }

}