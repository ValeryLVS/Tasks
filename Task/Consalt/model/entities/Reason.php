<?php


namespace app\model\entities;

use app\model\Model;
class Reason extends Model
{
    protected $id;
    protected $reason;
    protected $commit;

    protected $props = [
        'reason' => false,
        'commit' => false,
    ];

    public function __construct($reason = null, $commit = null)
    {
        $this->reason = $reason;
        $this->commit = $commit;
    }
}