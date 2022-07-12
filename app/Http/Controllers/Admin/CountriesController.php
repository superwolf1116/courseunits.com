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
use App\Models\Country;
use App\Models\State;
use Mail;
use App\Mail\SendMailable;

class CountriesController extends Controller {

    public function __construct() {
        $this->middleware('is_adminlogin');
    }

    public function index(Request $request) {
        $pageTitle = 'Manage Countries';
        $activetab = 'actcountries';
        $query = new Country();
        $query = $query->sortable();

        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Country::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Country::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Country::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            }
        }

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        }

        $countries = $query->orderBy('id', 'DESC')->paginate(20);
        if ($request->ajax()) {
            return view('elements.admin.countries.index', ['allrecords' => $countries]);
        }
        return view('admin.countries.index', ['title' => $pageTitle, $activetab => 1, 'allrecords' => $countries]);
    }

    public function add() {
        $pageTitle = 'Add Country';
        $activetab = 'actcountries';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:countries',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/countries/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'countries');
                $serialisedData['status'] = 1;
                Country::insert($serialisedData);
                Session::flash('success_message', "Country saved successfully.");
                return Redirect::to('admin/countries');
            }
        }
        return view('admin.countries.add', ['title' => $pageTitle, $activetab => 1]);
    }

    public function edit($slug = null) {
        $pageTitle = 'Edit Country';
        $activetab = 'actcountries';
        $recordInfo = Country::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/countries');
        }

        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:countries,name,' . $recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/countries/edit/' . $slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Country::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Country updated successfully.");
                return Redirect::to('admin/countries');
            }
        }
        return view('admin.countries.edit', ['title' => $pageTitle, $activetab => 1, 'recordInfo' => $recordInfo]);
    }

    public function activate($slug = null) {
        if ($slug) {
            Country::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action' => 'admin/countries/deactivate/' . $slug, 'status' => 1]);
        }
    }

    public function deactivate($slug = null) {
        if ($slug) {
            Country::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action' => 'admin/countries/activate/' . $slug, 'status' => 0]);
        }
    }

    public function delete($slug = null) {
        if ($slug) {
            Country::where('slug', $slug)->delete();
            Session::flash('success_message', "Country deleted successfully.");
            return Redirect::to('admin/countries');
        }
    }

    // for state
    public function state($cslug = null, Request $request) {
        $pageTitle = 'Manage State';
        $activetab = 'actcountries';
        $query = new State();
        $query = $query->sortable();

        $catInfo = DB::table('countries')->where('slug', $cslug)->first();

        //$catInfo = State::where('slug', $cslug)->first();
        if (!$catInfo) {
            return Redirect::to('admin/countries');
        }
        $query = DB::table('states')->where('country_id', $catInfo->id);
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                DB::table('states')->whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                DB::table('states')->whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                DB::table('states')->whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            }
        }

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        }

        $categories = $query->orderBy('id', 'DESC')->paginate(20);
        if ($request->ajax()) {
            return view('elements.admin.countries.state', ['allrecords' => $categories, 'catInfo' => $catInfo]);
        }
        return view('admin.countries.state', ['title' => $pageTitle, $activetab => 1, 'allrecords' => $categories, 'catInfo' => $catInfo]);
    }

    public function activatestate($cslug = null, $slug = null) {
        if ($slug) {
            // $query = DB::table('states')->where('slug',$slug);   
            DB::table('states')->where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action' => 'admin/countries/deactivatestate/' . $cslug . '/' . $slug, 'status' => 1]);
        }
    }

    public function deactivatestate($cslug = null, $slug = null) {
        if ($slug) {
            DB::table('states')->where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action' => 'admin/countries/activatestate/' . $cslug . '/' . $slug, 'status' => 0]);
        }
    }

    public function deletestate($cslug = null, $slug = null) {
        if ($slug) {
            DB::table('states')->where('slug', $slug)->delete();
            Session::flash('success_message', "State deleted successfully.");
            return Redirect::to('admin/countries/state/' . $cslug);
        }
    }

    public function editstate($cslug = null, $slug = null) {
        $pageTitle = 'Edit State';
        $activetab = 'actstate';
        //print_r($cslug);exit;
        //// $recordInfo = Category::where('slug', $slug)->first();
        $countryList = DB::table('countries')->where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->all();
        $recordInfo = DB::table('states')->where('slug', $slug)->first();
        // print_r($recordInfo);exit;
        if (empty($recordInfo)) {
            // echo"hii";exit;
            return Redirect::to('admin/countries');
        }
        //echo"hiibbbbb";exit;
        $catInfo = DB::table('countries')->where('slug', $cslug)->first();
        //$catInfo = Category::where('slug', $cslug)->first();
        // print_r($catInfo);exit;
        if (!$catInfo) {
            return Redirect::to('admin/countries');
        }
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/state/editstate/' . $slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                DB::table('states')->where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "State updated successfully.");
                return Redirect::to('admin/countries/state/' . $cslug);
            }
        }
        return view('admin.countries.editstate', ['title' => $pageTitle, $activetab => 1, 'recordInfo' => $recordInfo, 'catInfo' => $catInfo, 'countryList' => $countryList]);
    }

    public function addstate($cslug = null) {
        $pageTitle = 'Add State';
        $activetab = 'actstate';

        //$catInfo = State::where('slug', $cslug)->first();
        $countryList = DB::table('countries')->where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->all();
        $catInfo = DB::table('countries')->where('slug', $cslug)->first();
        if (!$catInfo) {
            return Redirect::to('admin/countries');
        }
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/countries/addstate/' . $cslug)->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'states');
                $serialisedData['status'] = 1;
                $serialisedData['country_id'] = $input['country_id'];
                // State::insert($serialisedData); 
                DB::table('states')->insert($serialisedData);
                Session::flash('success_message', "State saved successfully.");
                return Redirect::to('admin/countries/state/' . $cslug);
            }
        }
        return view('admin.countries.addstate', ['title' => $pageTitle, $activetab => 1, 'catInfo' => $catInfo, 'countryList' => $countryList]);
    }

}

?>