<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Coursecontent extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title', 'description', 'created_at'];
    
    public function Coursecontent(){
        return $this->belongsTo('App\Models\Coursecontent');
    }
    
}
