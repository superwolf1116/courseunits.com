<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Pgmlang extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
   
}
