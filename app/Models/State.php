<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class State extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'name','created_at'];
    
    public static function getStateList($id){
       return State::where('status', 1)->where('country_id', $id)->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
    public static function getCartStateList(){
       return State::where('status', 1)->orderBy('name', 'ASC')->pluck('name','name')->all();
    }
}
