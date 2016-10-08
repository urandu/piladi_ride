<?php

/**
 * Created by IntelliJ IDEA.
 * User: urandu
 * Date: 10/8/16
 * Time: 2:00 PM
 */
class User_model extends CI_Model
{


    function new_user($user_name,$user_password,$user_email,$user_phone,$user_status=1)
    {

        $data=array(
            "user_name"=>$user_name,
            "user_password"=>$user_password,
            "user_email"=>$user_email,
            "user_phone"=>$user_phone,
            "user_status"=>$user_status

        );
        $this->db->where("user_phone");
        $result=$this->db->get("user");
        if($result->num_rows()>0)
        {
            return false;
        }
        else
        {
            $this->db->insert("user",$data);
            return $this->db->insert_id();
        }



    }

    function update_user($user_id,$user_name,$user_password,$user_email,$user_phone,$user_status=1)
    {

        if($user_password=="previous")
        {
            $data=array(
                "user_name"=>$user_name,
                "user_password"=>$user_password,
                "user_email"=>$user_email,
                "user_status"=>$user_status

            );
        }
        else
        {
            $data=array(
                "user_name"=>$user_name,
                "user_password"=>$user_password,
                "user_email"=>$user_email,
                "user_phone"=>$user_phone,
                "user_status"=>$user_status

            );
        }

        $this->db->where("user_id",$user_id);
        $this->db->update("user",$data);

        return true;


    }


    function get_user($user_id)
    {

        $this->db->where("user_id",$user_id);
        $result=$this->db->get("user");
        if($result->num_rows()>0)
        {
            return $result->result()[0];
        }
        else
        {
            return false;
        }

    }

    function get_all_user()
    {
        $result=$this->db->get("user");
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