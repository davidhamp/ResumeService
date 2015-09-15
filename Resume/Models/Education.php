<?php

namespace ResumeService\Models;

use SPF\Model;

class Education extends Model
{

    /**
     * @SPF\JsonIgnore
     */
    public $id;

    /**
     * @SPF\JsonIgnore
     */
    public $person_id;

    public $school_name;

    public $start_date;

    public $graduation_date;

    public $level;

    public $comments;

}