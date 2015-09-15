<?php

namespace ResumeService\Models;

use SPF\Model;

class Skills extends Model
{

    /**
     * @SPF\JsonIgnore
     */
    public $id;

    /**
     * @SPF\JsonIgnore
     */
    public $person_id;

    public $skill_name;

    public $skill_description;

    public $skill_level;

}