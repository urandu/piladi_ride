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

        $this->db->insert("user",$data);
        return $this->db->insert_id();

    }

    function update_user()
    {

    }

    function deactivate_user()
    {

    }

    function get_user()
    {

    }

    function get_all_user()
    {

    }

}