<?php

require_once "../model/appointement.php";

class Appointement
{
    function index()
    {
        $app=new ApointementModel;
        $result=$app->show($reference);
    	// On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($result);
    }

    function add()
	{
		
    	$data = json_decode(file_get_contents("php://input"));

    	$app=new ApointementModel();

		if(!empty($data->date) && !empty($data->hour) && !empty($data->message) && !empty($data->reference))
		{
		

			$value=$app->insert($data->date,$data->heure,$data->message,$data->reference);

			if($value)
			{

            http_response_code(201);
            echo json_encode(["message" => "L'ajout a été effectué".$value]);
	        }else
	        {

	            http_response_code(503);
	            echo json_encode(["message" => "L'ajout n'a pas été effectué".$value]);         
	        }
		}else
		{
			
		    http_response_code(405);
		    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

    	//delete
	function delete()
	{
		
    	$data = json_decode(file_get_contents("php://input"));

    	$app=new ApointementModel();

		if(!empty($data->id))
		{
			$app->id = $data->id;
			$value=$app->delete($app->id);

			if($value)
			{
        
            http_response_code(201);
            echo json_encode(["message" => "suppression  a été effectué".$value]);
	        }else
	        {

	            http_response_code(503);
	            echo json_encode(["message" => "suppression n'a pas été effectué".$value]);         
	        }
		}else
		{
			// On gère l'erreur
		    http_response_code(405);
		    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}
}
