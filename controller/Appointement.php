<?php

require_once __DIR__."/../model/appointement.php";

class Appointement
{
    function index()
    {
		$data = json_decode(file_get_contents("php://input"));
        $app=new AppointementModel;
        $result=$app->show($data->reference);
		
    	// On envoie le code réponse 200 OK
		$num = count($result);
        // Check if any posts
        if ($num > 0) {
            // Post array
            $arr = array();
            // $posts_arr['data'] = array();
         
            $num=0;
			// print_r($result);
            foreach ($result as $row) {
                extract($row);
                $item=array();
                    $item = array(
                        'id' => $id,
                        'date' => $date,
                        'Hour' => $hour,
                        'message'=>$message
                    );  
                    array_push($arr, $item);
                    $num++;
               
             
            }

            // Turn to JSON & output
            echo json_encode(["data"=>$arr,"count"=>$num]);
    }
	}

    //add appointment
    function add()
	{
		
		$data = json_decode(file_get_contents("php://input"));
        $ReservationModel = new AppointementModel;
        $response =  $ReservationModel->add($data->reference,$data->date, $data->hour,$data->message);
        echo json_encode($response);
	}

    	//delete
	function delete()
	{
		
    	$data = json_decode(file_get_contents("php://input"));

    	$app=new AppointementModel();

		if(!empty($data->id))
		{
			$app->id = $data->id;
			$value=$app->delete($app->id);

			if($value)
			{
				
            echo json_encode(["message" => "suppression  a été effectué"]);
	        }else
	        {

	            echo json_encode(["message" => "suppression n'a pas été effectué"]);         
	        }
		}else
		{
			
		    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}
	 function update()
	{
		$data = json_decode(file_get_contents("php://input"));
        $ReservationModel = new AppointementModel;
        $response =  $ReservationModel->update($data->id,$data->date, $data->hour, $data->message);
        echo json_encode($response);
	}
}
