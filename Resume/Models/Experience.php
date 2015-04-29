<?php

namespace ResumeService\Models;

use SPF\Model;

class Experience extends Model
{

    public $id;

    public $person_id;

    public $start_date;

    public $end_date;

    public $company_name;

    public $job_title;

    public $description;

}