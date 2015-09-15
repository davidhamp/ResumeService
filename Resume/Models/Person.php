<?php

namespace ResumeService\Models;

use SPF\Model;

class Person extends Model
{
    /**
     * @SPF\JsonIgnore
     */
    public $id;

    public $first_name;

    public $last_name;

    public $street_address;

    public $city;

    public $state;

    public $zip;

    public $phone_number;

    public $email;

    public $url;

    /**
     * @SPF\JsonIgnore
     */
    public $public;

}