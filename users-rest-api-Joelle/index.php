<?php

$loader = new \Phalcon\Loader();
$loader->registerDirs(array( __DIR__ . '/models/'))->register();
$di = new \Phalcon\DI\FactoryDefault();

//Set up the database service
$di->set('db', function(){
    return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "dbname" => "users"
    ));
});

$app = new \Phalcon\Mvc\Micro();

//Bind the DI to the application
$app->setDI($di);

//Retrieves all users
$app->get('/', function() use ($app) {

    $phql = "SELECT * FROM users ";

    $users = $app->modelsManager->executeQuery($phql);

    $data = array();
    foreach($users as $user){
        $data[] = array(
            'id' => $user->id,
            'full_name' => $user->full_name,
        );
    }

    echo json_encode($data);

});


//Retrieves users based on id primary key
$app->get('/api/users/{id:[0-9]+}', function($id) use ($app) {

    $phql = "SELECT * FROM Users WHERE id = :id:";
    $user = $app->modelsManager->executeQuery($phql, array('id' => $id ))->getFirst();

    if ($user==false) {
        $response = array('status' => 'NOT-FOUND');
    } else {
        $response = array(
            'status' => 'FOUND',
            'data' => array(
						'id' => $user->id,
						'full_name' => $user->full_name,    
						'email' => $user->email,
						'password' => $user->password,
						'join_date' => $user->join_date,
					 )
        );
    }

    echo json_encode($response);
});


//Creates a new user account
$app->post('/api/users', function() use ($app) {

    $user = json_decode($app->request->getRawBody());

    $phql = "INSERT INTO Users (full_name, email, password,join_date) VALUES (:full_name:, :email:, :password:, :join_date:)";

    $status = $app->modelsManager->executeQuery($phql, array(
        'full_name' => $user->full_name,
        'email'     => $user->email,
        'password'  => $user->password,
		'join_date' => $user->join_date
    ));

    //Check if the insertion was successfull
    if($status->success()==true){

        $user->id = $status->getModel()->id;

        $response = array('status' => 'OK', 'data' => $user);

    } else {

        //Change the HTTP status
        $this->response->setStatusCode(500, "Internal Error")->sendHeaders();

        //Send errors to the client
        $errors = array();
        foreach ($status->getMessages() as $message) {
            $errors[] = $message->getMessage();
        }

        $response = array('status' => 'ERROR', 'messages' => $errors);

    }

    echo json_encode($response);

});


$app->handle();
?>