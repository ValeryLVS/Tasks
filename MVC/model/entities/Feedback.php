<?php


namespace app\model\entities;

use app\model\Model;

class Feedback extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $is_true;

    protected $props = [
        'name' => false,
        'feedback' => false,
        'is_true' => false
    ];

    public function __construct($name = null, $feedback = null, $is_true = 0)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->is_true = $is_true;
    }
}


