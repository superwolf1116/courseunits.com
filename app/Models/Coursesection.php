<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Coursesection extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title', 'description', 'created_at'];
    
    public function Coursesection(){
        return $this->belongsTo('App\Models\Coursesection');
    }
    
}
