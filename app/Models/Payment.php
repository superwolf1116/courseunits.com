<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Payment extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function Course(){
        return $this->belongsTo('App\Models\Course');
    }
    public function Order(){
        return $this->belongsTo('App\Models\Myorder','order_id');
    }
    
    
}
