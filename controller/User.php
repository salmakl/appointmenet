<?php

require_once __DIR__."/../model/user.php";

class User 
{
    function index()
    {

    }

    function add()
    {
        $data = json_decode(file_get_contents("php://input"));
        $app=new UserModel;
        $user=$app->add($data->reference,$data->fname,$data->lname,$data->age,$data->email,$data->phone);
        echo json_encode($user);


    }

    function login()
    {
        $data = json_decode(file_get_contents("php://input"));
        $app=new UserModel;
        $log=$app->check_User($data->reference);   
        echo json_encode(["ref"=>$log]);
    }
}