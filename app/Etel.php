<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Etel extends Model
{
    protected $guarded = [];

    use Sortable;
    public $sortable = [
        'id',
        'nev',
        'ar',
        'kategoria',
        'feltetek',
        'kep'
    ];
}
