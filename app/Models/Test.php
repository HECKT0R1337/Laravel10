<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];


    public function getnameAttribute($value)
    {

       $color = ($value =='Mobile') ? 'red' :'green';
        return 'Product: ' . '<span style="color:' . $color . '">' . $value . '</span>';
    }

    public function getdescriptionAttribute($value)
    {
        return 'Model: ' . $value;
    }

    public function getDeletedAtAttribute($value)
    {
        // return 'Trashed at: '. $value;
        return  'Trashed at: ' . date('d-M h:i:s', strtotime($value));
    }
}
