<?php

namespace ResumeService\Models;

use SPF\Model;

class Content extends Model
{
    /**
     * @SPF:JsonIgnore
     */
    public $id;

    /**
     * @SPF:JsonIgnore
     */
    public $person_id;

    public $type;

    public $content;

}