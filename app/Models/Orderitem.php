<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Orderitem extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function Buyer(){
        return $this->belongsTo('App\Models\User', 'buyer_id');
    }
    public function Seller(){
        return $this->belongsTo('App\Models\User', 'seller_id');
    }
    public function Course(){
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
}
