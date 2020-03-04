<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Etel extends Model
{
    use Sortable;

    protected $guarded = [];
    public $sortable = [
        'id',
        'nev',
        'ar',
        'kategoria',
        'feltetek',
        'kep'
    ];
}
