<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use IsAdmin;
use App\Models\Course;
use App\Models\User;
use Mail;
use App\Mail\SendMailable;

class CoursesController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Courses'; 
        $activetab = 'actcourses';
        $query = new Course();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Course::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Course::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Course::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('title', 'like', '%'.$keyword.'%');
            });
        }
        
        $courses = $query->orderBy('id','DESC')->paginate(30);
        if($request->ajax()){
            return view('elements.admin.courses.index', ['allrecords'=>$courses]);
        }
        return view('admin.courses.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$courses]);
    }

    public function add(){
        $pageTitle = 'Add Course'; 
        $activetab = 'actcourses';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:courses',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/courses/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'courses');
                $serialisedData['status'] =  1;
                Course::insert($serialisedData); 
                Session::flash('success_message', "Course saved successfully.");
                return Redirect::to('admin/courses');
            }           
        }        
        return view('admin.courses.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Course'; 
        $activetab = 'actcourses';
        $recordInfo = Course::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/courses');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:courses,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/courses/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Course::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Course updated successfully.");
                return Redirect::to('admin/courses');
            }           
        }        
        return view('admin.courses.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Course::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/courses/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Course::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/courses/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Course::where('slug', $slug)->delete();
            Session::flash('success_message', "Course deleted successfully.");
            return Redirect::to('admin/courses');
        }
    }    
}
?>