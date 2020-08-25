<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tetel extends Model
{
    protected $guarded = [];

    use Sortable;
    public $sortable = [
        'rendeles_id',
        'etelek_id',
        'mennyiseg'
    ];

    public function rendeles()
    {
        return $this->belongsToMany('App\Rendeles');
    }

    public function etel()
    {
        return $this->belongsToMany('App\Etel');
    }
}
