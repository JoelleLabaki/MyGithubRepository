<?php

use \Phalcon\Mvc\Model\Message;
use \Phalcon\Mvc\Model\Validator\InclusionIn;
use \Phalcon\Mvc\Model\Validator\Uniqueness;

class Users extends \Phalcon\Mvc\Model
{

    public function validation()
    {
        //email must be unique
        $this->validate(new Uniqueness(
            array(
                "field"   => "email",
                "message" => "The email must be unique"
            )
        ));

    }

}

?>