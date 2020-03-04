<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Role extends Model
{
    protected $guarded = [];

    use Sortable;
    public $sortable = [
        'id',
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
