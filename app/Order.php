<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    protected $guarded = [];

    use Sortable;
    public $sortable = [
        'id',
        'user_id',
        'fizetes_modja',
        'megjegyzes',
        'allapot',
        'fizetendo_osszeg',
        'rendelo_adatai',
        'created_at',
    ];

    public function tetels()
    {
        return $this->belongsToMany('App\Tetel');
    }
}
