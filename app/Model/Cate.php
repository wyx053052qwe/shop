<?php

namespace App\Model;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    use ModelTree;
    protected $table = 'cate';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setParentColumn('cate_pid');
        $this->setOrderColumn('soft');
        $this->setTitleColumn('cate_name');
    }
}
