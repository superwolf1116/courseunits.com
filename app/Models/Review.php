<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Review extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Otheruser(){
        return $this->belongsTo('App\Models\User', 'otheruser_id');
    }
    public function Myorder(){
        return $this->belongsTo('App\Models\Myorder');
    }
    public function Course(){
        return $this->belongsTo('App\Models\Course');
    }
}
