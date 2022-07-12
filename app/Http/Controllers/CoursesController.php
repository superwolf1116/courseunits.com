<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
//use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Http\Request;
use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use Mail;
use App\Mail\SendMailable;
use Socialite;
use App\Models\Course;
use App\Models\User;
use App\Models\Coursesection;
use App\Models\Coursecontent;
use App\Models\Courseextra;
use App\Models\Coursefaq;
use App\Models\Courserequirement;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Review;
use App\Models\Myorder;
use App\Models\Orderitem;

include_once('getid3/getid3/getid3.php');

use getid3;

class CoursesController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['listing', 'detail', 'getkeyword']]);
    }

    public function create() {
        $pageTitle = 'Create a new Course';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();
        $input = Input::all();

        $user_id = Session::get('user_id');

        $userInfo = User::where('id', $user_id)->first();

        if ($userInfo->first_name == '' || $userInfo->last_name == '' || $userInfo->contact == '') {
            $error = 'Please complete profile details.';
            return Redirect::to('/users/myaccount')->withErrors($error);
        }

        if (!empty($input)) {
            //echo "<pre>"; print_r($input);exit;
            $rules = array(
                'title' => 'required|min:5||unique:courses',
                'sub_title' => 'required|min:5',
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'level' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required',
                'sample_video' => 'required',
            );
            $customMessages = [
                'category_id.required' => 'The category name field is required field.',
                'subcategory_id.required' => 'The sub category name field is required field.',
                'sample_video.required' => 'The video field is required field.',
//                'level.required' => 'The level field is required field.',
//                'description.required' => 'The description field is required field.',
            ];
            $validator = Validator::make($input, $rules, $customMessages);
            if ($validator->fails()) {
                return Redirect::to('courses/create')->withErrors($validator)->withInput();
            } else {


                $serialisedData = $this->serialiseFormData($input);

                $img = $input['image'];
                if ($img->getClientOriginalName()) {
                    $file = $img;
                    $uploadedFileName = $this->uploadImage($file, COURSE_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, COURSE_FULL_UPLOAD_PATH, COURSE_SMALL_UPLOAD_PATH, COURSE_MW, COURSE_MH);
                    $serialisedData['image'] = $uploadedFileName;
                }

                $video = $input['sample_video'];
                if ($video->getClientOriginalName()) {
                    $getID3 = new getID3;
                    $file1 = $getID3->analyze($video);
                    $file = $video;
                    $uploadedFileName = $this->uploadImage($file, COURSE_VIDEO_FULL_UPLOAD_PATH);
                    $serialisedData['sample_video'] = $uploadedFileName;

                    $serialisedData['sample_video_time'] = $file1['playtime_string'];
                }

                unset($serialisedData['stepcnt']);
                $slug = $this->createSlug($input['title'], 'courses');
                $serialisedData['slug'] = $slug;
                $serialisedData['user_id'] = $user_id;
                Course::insert($serialisedData);

                Session::flash('success_message', "Course details saved successfully.");
                return Redirect::to('courses/edit/' . $slug);
            }
        }

        return view('courses.create', ['title' => $pageTitle, 'catList' => $catList, 'skills' => $skills]);
    }

    public function edit($slug = null) {
        ini_set('post_max_size', '-1');
        $pageTitle = 'Edit Course';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();

        $recordInfo = Course::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('users/dashboard');
        }

        $recordContentInfo = array();
        $recordSectionInfo = Coursesection::where('course_id', $recordInfo->id)->get();
        $contents = Coursecontent::where('course_id', $recordInfo->id)->get();
        if ($contents) {
            foreach ($contents as $content) {
                $recordContentInfo[$content->section_id][] = $content;
            }
        }

        //echo '<pre>';print_r($recordContentInfo);exit;
//        $recordImgInfo = Image::where('course_id', $recordInfo->id)->get();

        $subCatList = array();
        $subsubCatList = array();
        if ($recordInfo->category_id) {
            $subCatList = Category::getSubCategoryList($recordInfo->category_id);
        }
        if ($recordInfo->subcategory_id) {
            $subsubCatList = Category::getSubCategoryList($recordInfo->subcategory_id);
        }

        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
            //echo "<pre>"; print_r($input);exit;

            if ($input['stepcnt'] == 1 || $input['stepcnt'] == 2 || $input['stepcnt'] == 3) {
                $rules = array(
                    'title' => 'required|min:5',
                    'sub_title' => 'required|min:5',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'level' => 'required',
                    'description' => 'required',
                    'price' => 'required',
                );
                $customMessages = [
                    'category_id.required' => 'The category name field is required field.',
                    'subcategory_id.required' => 'The sub category name field is required field.'
                ];

                $validator = Validator::make($input, $rules, $customMessages);
            } elseif ($input['stepcnt'] == 2) {
                $rules = array(
                    'section_title' => 'required',
//                    'lecture_title' => 'required',
//                    'lecture_description' => 'required',
                );
                $validator = Validator::make($input, $rules);
            }

            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                //echo '<pre>';print_r($input);exit;
                $serialisedData = $this->serialiseFormData($input);

                //For section
                if (isset($serialisedData['section_title'])) {
                    $titlearr = $serialisedData['section_title'];
                    unset($serialisedData['section_title']);
                }

//                if (isset($serialisedData['lecture_title'])) {
//                    $stitleearr = $serialisedData['lecture_title'];
//                    unset($serialisedData['lecture_title']);
//                }
//                
//                if (isset($serialisedData['lecture_description'])) {
//                    $descarr = $serialisedData['lecture_description'];
//                    unset($serialisedData['lecture_description']);
//                }
//                if (isset($serialisedData['video'])) {
//                    $videoarr = $serialisedData['video'];
//                    unset($serialisedData['video']);
//                }

                if (isset($serialisedData['old_video'])) {
                    $oldvideoarr = $serialisedData['old_video'];
                    unset($serialisedData['old_video']);
                }


                if ($serialisedData['stepcnt'] == 3) {
                    $serialisedData['status'] = 1;
                }

                $currentstepcount = $serialisedData['stepcnt'];
                unset($serialisedData['stepcnt']);
                unset($serialisedData['savecnt']);
                unset($serialisedData['isvideo']);
                unset($serialisedData['checkbutton']);
                unset($serialisedData['isdocupload']);
                unset($serialisedData['isdocsupload']);


                if ($currentstepcount == 1) {
                    if (isset($input['image']) && !empty($input['image'])) {
                        $img = $input['image'];
                        if ($img->getClientOriginalName()) {
                            $file = $img;
                            $uploadedFileName = $this->uploadImage($file, COURSE_FULL_UPLOAD_PATH);
                            $this->resizeImage($uploadedFileName, COURSE_FULL_UPLOAD_PATH, COURSE_SMALL_UPLOAD_PATH, COURSE_MW, COURSE_MH);
                            $serialisedData['image'] = $uploadedFileName;
                        }
                    }

                    if (isset($serialisedData['sample_video']) && !empty($serialisedData['sample_video'])) {
                        $video = $serialisedData['sample_video'];
                        if ($video->getClientOriginalName()) {
                            $getID3 = new getID3;
                            $file1 = $getID3->analyze($video);
                            $file = $video;
                            $uploadedFileName = $this->uploadImage($file, COURSE_VIDEO_FULL_UPLOAD_PATH);
                            $serialisedData['sample_video'] = $uploadedFileName;
                            ;
                            $serialisedData['sample_video_time'] = $file1['playtime_string'];
                        }
                    }
                }

                Course::where('id', $recordInfo->id)->update($serialisedData);

                if ($currentstepcount == 2) {

                    if (!empty($titlearr)) {
//                        echo '<pre>';print_r($titlearr);exit;
//                        Coursesection::where('course_id', $recordInfo->id)->delete();
//                        Coursecontent::where('course_id', $recordInfo->id)->delete();
                        $i = 0;
                        foreach ($titlearr as $key => $contents) {
                            $i = $i + 1;
                            $serialisedSecData = array();
                            $serialisedSecData['course_id'] = $recordInfo->id;
                            $serialisedSecData['user_id'] = $user_id;
                            $eslug = $this->createSlug('section' . $recordInfo->id . $i, 'coursesections');
                            $serialisedSecData['slug'] = $eslug;
                            $serialisedSecData['section_title'] = $contents['name'];
                            $serialisedSecData['status'] = 1;

                            if (isset($contents['id'])) {
                                $sectionId = $contents['id'];
                                DB::table('coursesections')->where('id', $sectionId)->update($serialisedSecData);
                            } else {
                                Coursesection::insert($serialisedSecData);

                                $sectionId = DB::getPdo()->lastInsertId();
                            }

                            foreach ($contents as $cKey => $cValue) {
                                //echo '<pre>';echo $cKey;
                                if ($cKey != 'name' && $cKey != 'id') {
                                    //echo '<pre>';print_r($cValue);exit;
                                    $serialisedExtData = array();
                                    $serialisedExtData['course_id'] = $recordInfo->id;
                                    $serialisedExtData['section_id'] = $sectionId;
                                    $serialisedExtData['user_id'] = $user_id;
                                    $eslug = $this->createSlug('content' . $recordInfo->id . $i, 'coursecontents');
                                    $serialisedExtData['slug'] = $eslug;
                                    $serialisedExtData['lecture_title'] = $cValue['lecture_title'];
                                    $serialisedExtData['lecture_description'] = $cValue['lecture_description'];

                                    if (isset($cValue['video'])) {
                                        $getID3 = new getID3;
                                        $file1 = $getID3->analyze($cValue['video']);
                                        $img = $cValue['video'];
                                        if ($img->getClientOriginalName()) {
                                            $file = $img;
                                            $uploadedFileName = $this->uploadImage($file, COURSE_VIDEO_FULL_UPLOAD_PATH);
                                            if (isset($oldvideoarr[$key])) {
                                                $old_video = $oldvideoarr[$key];
                                                if ($old_video) {
                                                    @unlink(COURSE_VIDEO_FULL_UPLOAD_PATH . $old_video);
                                                }
                                            }
                                        }
                                        $serialisedExtData['video'] = $uploadedFileName;

                                        $serialisedExtData['video_time'] = $file1['playtime_string'];
                                    }

                                    $serialisedExtData['status'] = 1;

                                    if (isset($cValue['id'])) {
                                        $contentId = $cValue['id'];
                                        DB::table('coursecontents')->where('id', $contentId)->update($serialisedExtData);
                                    } else {
                                        Coursecontent::insert($serialisedExtData);
                                    }
                                }
                            }
                        }
                        //exit;
//                        Coursecontent::where('course_id', $recordInfo->id)->delete();
//                        $i = 0;
//                        foreach ($titlearr as $key => $course) {
//                            $i = $i + 1;
//                            $serialisedExtData = array();
//                            $serialisedExtData['course_id'] = $recordInfo->id;
//                            $serialisedExtData['user_id'] = $user_id;
//                            $eslug = $this->createSlug('content' . $recordInfo->id . $i, 'coursecontents');
//                            $serialisedExtData['slug'] = $eslug;
//                            $serialisedExtData['section_title'] = $course;
//                            $serialisedExtData['lecture_title'] = $stitleearr[$key];
//                            $serialisedExtData['lecture_description'] = $descarr[$key];
//                            
//                            if(isset($videoarr)){
//                            $img = $videoarr[$key];
//                                if ($img->getClientOriginalName()) {
//                                    $file = $img;
//                                    $uploadedFileName = $this->uploadImage($file, COURSE_VIDEO_FULL_UPLOAD_PATH);
//                                    if (isset($oldvideoarr[$key])) {
//                                        $old_video = $oldvideoarr[$key];
//                                        if ($old_video) {
//                                            @unlink(COURSE_VIDEO_FULL_UPLOAD_PATH . $old_video);
//                                        }
//                                    }
//                                }
//                                $serialisedExtData['video'] = $uploadedFileName;
//                            }
//                            
//                            
//                            $serialisedExtData['status'] = 1;
//                            Coursecontent::insert($serialisedExtData);
//                        }
                    }
                }

                if ($currentstepcount == 3) {
                    Session::flash('success_message', "Course details saved successfully.");
                    return Redirect::to('courses/management');
                } else {
                    return response()->json(['errors' => '', 'status' => 1, 'message' => ["Detail saved!"], 'courseslug' => [$recordInfo->slug]]);
                }
                exit;
            }
        }
//        echo "<pre>";print_r($recordInfo);exit;
        return view('courses.edit', ['title' => $pageTitle, 'catList' => $catList, 'subCatList' => $subCatList, 'subsubCatList' => $subsubCatList, 'skills' => $skills, 'courseDetail' => $recordInfo, 'recordContentInfo' => $recordContentInfo, 'recordSectionInfo' => $recordSectionInfo]);
    }

    public function getsubcategorylist($id = null) {
        if ($id && $id > 0) {
            $subCatList = Category::getSubCategoryList($id);
            return view('elements.subcategorylist', ['subCatList' => $subCatList]);
        } else {
            return view('elements.subcategorylist', ['subCatList' => array()]);
        }
    }

    public function getsubsubcategorylist($id = null) {
        if ($id && $id > 0) {
            $subCatList = Category::getSubCategoryList($id);
            return view('elements.subsubcategorylist', ['subCatList' => $subCatList]);
        } else {
            return view('elements.subsubcategorylist', ['subCatList' => array()]);
        }
    }

    public function add() {
        $pageTitle = 'Manage Settings';
        return view('courses.add', ['title' => $pageTitle]);
    }

    public function management(Request $request) {
        $pageTitle = 'Manage Courses';
        $query = new Course();

        $userdata = DB::table('users')->where(['id' => Session::get('user_id')])->first();

        $query = $query->where('user_id', '=', Session::get('user_id'));

        if ($request->has('pause')) {
            $pause = $request->get('pause');
            if ($request->has('id_fil')) {

                unset($pause[$request->get('id_fil')]);
            }
            DB::table('courses')->where('user_id', Session::get('user_id'))->update(array('pause' => 0));

            foreach ($pause as $key => $value) {
                DB::table('courses')->where('id', $key)->update(array('pause' => $value));
            }
        }
        // echo $request->get('hide_weekend');
        // echo $request->get('accept_orders');
        if ($request->has('hide_weekend')) {
            $hide_weekend = $request->get('hide_weekend');
            DB::table('users')->where('id', Session::get('user_id'))->update(array('hide_weekend' => $hide_weekend));
        } else {
            $hide_weekend = 0;
        }
        if ($request->has('accept_orders')) {
            $accept_orders = $request->get('accept_orders');
            DB::table('users')->where('id', Session::get('user_id'))->update(array('accept_orders' => $accept_orders));
        } else {
            $accept_orders = 0;
        }
//        if ($request->has('category_id') && $request->get('category_id') > 0) {
//            $query = $query->where('category_id', $request->get('category_id'));
//        }
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        if ($page == 1) {
            $limit = 19;
        } else {
            $limit = 20;
        }
        $allrecords = $query->orderBy('id', 'DESC')->paginate($limit, ['*'], 'page', $page);
        if ($request->ajax()) {
            return view('elements.courses.management', ['allrecords' => $allrecords, 'page' => $page, 'userdata' => $userdata, 'limit' => $limit]);
        }
        //echo "<pre>"; print_r($allrecords);exit;
        $catList = Category::getCategoryList();
        return view('courses.management', ['title' => $pageTitle, 'allrecords' => $allrecords, 'catList' => $catList, 'userdata' => $userdata, 'page' => $page, 'limit' => $limit]);
    }

    public function uploaddocument() {
        $msgString = "";
        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
//            echo "<pre>"; print_r($input);exit;
            $rules = array(
                'files_name' => 'mimes:doc,docx,pdf',
            );

            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()->all()]);
                //return Redirect::to('/admin/courses/create')->withErrors($validator)->withInput();
            } else {

                $files = explode(',', $input['pdf_doc']);
                if (Input::hasFile('files_name')) {
                    $file = Input::file('files_name');
                    $uploadedFileName = $this->uploadImage($file, GIG_DOC_FULL_UPLOAD_PATH);
                    $rand = rand(100, 999);
                    $html = '<li id="' . $rand . '" data-img="' . $uploadedFileName . '" class="portfolio-cc">' . $uploadedFileName . '<a href="#" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                    $files[] = $uploadedFileName;
                }
                return response()->json(['errors' => '', 'status' => 1, 'message' => ["Course document is successfully uploaded."], 'file_name' => [$html], 'json_data' => [implode(',', $files)]]);
            }
        }
        exit;
    }

    public function uploaddoc() {

        $msgString = "";
        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
            $rules = array(
                    //'files_name' => 'mimes:doc,docx,pdf',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $files = explode(',', $input['document']);
                if (Input::hasFile('doc_name')) {
                    $file = Input::file('doc_name');
                    $uploadedFileName = $this->uploadImage($file, GIG_DOC_FULL_UPLOAD_PATH);
                    $rand = rand(100, 999);
                    $html = '<li id="' . $rand . '" data-img="' . $uploadedFileName . '" class="portfolio-cc">' . $uploadedFileName . '<a href="#" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                    $files = $uploadedFileName;
                }
                return response()->json(['errors' => '', 'status' => 1, 'message' => ["Course document is successfully uploaded."], 'file_name' => [$html], 'json_data' => [$files]]);
            }
        }
        exit;
    }

    public function delete($slug = null) {
        if ($slug) {
            Course::where('slug', $slug)->delete();
            Session::flash('success_message', "Course deleted successfully.");
            return Redirect::to('courses/management');
        }
    }

    public function deleteimage($id = null) {
        if ($id) {
            $course = Course::where('id', $id)->first();
            $old_image = $course->image;
            Course::where('id', $id)->update(array('image' => ''));
            if ($old_image) {
                @unlink(COURSE_FULL_UPLOAD_PATH . $old_image);
                @unlink(COURSE_SMALL_UPLOAD_PATH . $old_image);
            }
            exit;
        }
    }

    public function deletesection($id = null) {
        if ($id) {
            Coursesection::where('id', $id)->delete();
            Coursecontent::where('section_id', $id)->delete();
            echo 1;
            exit;
        }
    }

    public function deletecontent($id = null) {
        if ($id) {
            Coursecontent::where('id', $id)->delete();
            echo 1;
            exit;
        }
    }

    public function listing(Request $request, $catslug = null, $subcatslug = null, $subsubcatslug = null) {
        $pageTitle = 'View Courses';
        //echo 123;exit;
        $trendings = array();

        $query = new Course();
        $query = $query->with('User');
        $query = $query->where('status', 1);

        $mysavecourses = $this->getSavedCourses();
        $olftitle = '';
        $catInfo = array();
        if ($catslug) {
            $catInfo = Category::where('slug', $catslug)->first();
            if (empty($catInfo)) {
                return Redirect::to('courses');
            } else {
                $category_id = $catInfo->id;
                $query = $query->where('category_id', $catInfo->id);

                $trendings = Course::where('category_id', $catInfo->id)->where('status', 1)->orderBy('id', 'DESC')->get();
            }
        }
        //echo '<pre>';print_r($catInfo);exit;

        $subCatInfo = array();
        if ($subcatslug) {
            $subCatInfo = Category::where('slug', $subcatslug)->first();
            if (empty($subCatInfo)) {
                return Redirect::to('courses/' . $catslug);
            } else {
                $subcategory_id = $subCatInfo->id;
                $query = $query->where('subcategory_id', $subCatInfo->id);
            }
        }

        $subsubCatInfo = array();
        if ($subsubcatslug) {
            $subsubCatInfo = Category::where('slug', $subsubcatslug)->first();
            if (empty($subsubCatInfo)) {
                return Redirect::to('courses/' . $catslug . '/' . $subcatslug);
            } else {
                $subsubcategory_id = $subsubCatInfo->id;
                $query = $query->where('subsubcategory_id', $subsubcategory_id);
            }
        }

        if ($request->has('topic') && $request->get('topic') > 0) {
            $query = $query->where('subcategory_id', $request->get('topic'));
        }
        if ($request->has('level') && $request->get('level') > 0) {
            $query = $query->where('level', $request->get('level'));
        }
//        if ($request->has('language')) {
//            $query = $query->where('language', $request->get('language'));
//        }
        if ($request->has('price') && $request->get('price') > 0) {
            $query = $query->where('price', $request->get('price'));
        }
//        if ($request->has('rating')) {
//            $query = $query->where('rating', $request->get('rating'));
//        }
//        if ($request->has('duration')) {
//            $query = $query->where('duration', $request->get('duration'));
//        }

        if ($request->has('title') && $request->get('title') != '') {
            $olftitle = $request->get('title');
            $query = $query->where('title', 'like', '%' . $request->get('title') . '%');
        }
//        if ($request->has('price_min') && $request->get('price_min') != '') {
//            $query = $query->where('price', '>=', $request->get('price_min'));
//        }
//        if ($request->has('price_max') && $request->get('price_max') != '') {
//            $query = $query->where('price', '<=', $request->get('price_max'));
//        }
//        if ($request->has('delivery_time') && $request->get('delivery_time') > 0) {
//            $query = $query->where('basic_delivery', '<=', $request->get('delivery_time'));
//        }
//        if ($request->has('langauge') && $request->get('langauge') != '') {
//            $langaugeArray = $request->get('langauge');
//            $query = $query->whereHas('User', function($q) use ($langaugeArray) {
//                $first = array_shift($langaugeArray);
//                $q = $q->where('languages', 'like', '%' . $first . '%');
//                if (count($langaugeArray) > 0) {
//                    foreach ($langaugeArray as $langn) {
//                        $q = $q->orWhere('languages', 'like', '%' . $langn . '%');
//                    }
//                }
//            });
//        }
//
//        if ($request->has('country_id') && $request->get('country_id') > 0) {
//            $country_id = $request->get('country_id');
//            $query = $query->whereHas('User', function($q) use ($country_id) {
//                $q->where('country_id', $country_id);
//            });
//        }
//
//        $filter_type = 0;
//        if ($request->has('filter_type') && $request->get('filter_type') > 0) {
//            $filter_type = $request->get('filter_type');
//        }
//        switch ($filter_type) {
//            case 1:
//                $query = $query->orderBy('price', 'ASC');
//                break;
//            case 2:
//                $query = $query->orderBy('price', 'DESC');
//                break;
//            case 3:
//                $query = $query->orderBy('id', 'DESC');
//                break;
//            case 4:
//                $query = $query->orderBy('id', 'ASC');
//                break;
//            default:
//                $query = $query->orderBy('price', 'ASC');
//        }

        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }

        $limit = 16;

        $allrecords = $query->paginate($limit, ['*'], 'page', $page);
        $allrecordcount = $query->count();
        //echo '<pre>';print_r($allrecordcount);exit;
        if ($request->ajax()) {
            return view('elements.courses.listing', ['allrecords' => $allrecords, 'allrecordcount' => $allrecordcount, 'trendings' => $trendings, 'page' => $page, 'mysavecourses' => $mysavecourses, 'isajax' => 1]);
        }

//        if($request->ajax()){
//            return view('elements.courses.listing', ['allrecords'=>$allrecords, 'mysavecourses'=>$mysavecourses]);
//        }

        $catListSlugs = array();
        if (isset($subcategory_id) && $subcategory_id > 0) {

            $catList = Category::getSubCategoryList($category_id);

            $coursecatlist = DB::table('courses')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('subcategory_id', $subcategory_id)
                            ->where('category_id', $category_id)
                            ->where('status', 1)
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } elseif (isset($category_id) && $category_id > 0) {
            $catList = Category::getSubCategoryList($category_id);
            $coursecatlist = DB::table('courses')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('category_id', $category_id)
                            ->where('status', 1)
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } else {
            $catListSlugs = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('name', 'ASC')->pluck('slug', 'id')->all();
            $catList = Category::getCategoryList();
            $coursecatlist = DB::table('courses')
                            ->select('category_id', DB::raw('count(*) as total'))
                            ->where('status', 1)
                            ->groupBy('category_id')
                            ->pluck('total', 'category_id')->all();
        }
        //print_r($catList);exit;
        $countryLists = DB::table('countries')->where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('courses.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'allrecordcount' => $allrecordcount, 'trendings' => $trendings, 'catList' => $catList, 'coursecatlist' => $coursecatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavecourses' => $mysavecourses, 'olftitle' => $olftitle, 'subcatslug' => $subcatslug]);
    }

    public function getkeyword(Request $request) {
        //echo 1;exit;
        $pageTitle = 'View Courses';
        //$query = new Searchkeyword();
        $query1 = '';
        $limit = 6;
        $remining_keyword = $limit;
        $count = 0;
        $searchkeywords = array();
        $skills = array();
        $courseextras = array();
        $categories = array();

        if ($request->has('keyword') && $request->get('keyword') != '') {
            $keyword = $request->get('keyword');
            //$searchkeywords = Searchkeyword::where('search_title', 'like', '%' . $request->get('keyword') . '%')->orderBy('search_title', 'ASC')->pluck('search_title', 'id')->take($remining_keyword)->all();
            //$remining_keyword = $remining_keyword- count($searchkeywords);
            if (Session::get('locale') == 'ru') {
                if ($remining_keyword > 0) {
                    $skills = Skill::where('name_ru', 'like', '%' . $request->get('keyword') . '%')->orderBy('name_ru', 'ASC')->pluck('name_ru', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($skills);
                }
                if ($remining_keyword > 0) {
                    $categories = Category::where('name_ru', 'like', '%' . $request->get('keyword') . '%')->orderBy('name_ru', 'ASC')->pluck('name_ru', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($categories);
                }

                if ($remining_keyword > 0) {
                    $courseextras = Courseextra::where('title', 'like', '%' . $request->get('keyword') . '%')->orderBy('title', 'ASC')->pluck('title', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($courseextras);
                }
            } else {
                $lSelect = 'English';
                if ($remining_keyword > 0) {
                    $skills = Skill::where('name', 'like', '%' . $request->get('keyword') . '%')->orderBy('name', 'ASC')->pluck('name', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($skills);
                }

                if ($remining_keyword > 0) {
                    $categories = Category::where('name', 'like', '%' . $request->get('keyword') . '%')->orderBy('name', 'ASC')->pluck('name', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($categories);
                }

                if ($remining_keyword > 0) {
                    $courseextras = Courseextra::where('title', 'like', '%' . $request->get('keyword') . '%')->orderBy('title', 'ASC')->pluck('title', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($courseextras);
                }
            }
            $query1 = DB::table('users')->select('first_name', 'last_name', 'slug')->where(DB::raw('CONCAT(first_name," ",last_name)'), 'like', "%{$keyword}%")->limit(4)->get();
        }

        $allrecords = array_merge($courseextras, $skills, $searchkeywords, $categories);
        $alluserrecords = json_decode(json_encode($query1), true);

        if ($request->ajax()) {
            return view('elements.courses.getkeyword', ['keyword' => $keyword, 'allrecords' => $allrecords, 'alluserrecords' => $alluserrecords, 'isajax' => 1]);
        }
        exit;

        //return view('courses.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'loginuser' => $loginuser, 'catList' => $catList, 'coursecatlist' => $coursecatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavecourses' => $mysavecourses, 'olftitle' => $olftitle]);
    }

    public function offeredcourse() {
        $pageTitle = 'Offered Courses';


        $allrecords = Course::where('offer_user', Session::get('user_id'))->orderBy('id', 'DESC')->get();

        return view('courses.offeredcourse', ['title' => $pageTitle, 'allrecords' => $allrecords]);
    }

    public function myofferedcourse() {
        $pageTitle = 'My Offered Courses';

        $allrecords = Course::where('user_id', Session::get('user_id'))->where('type_course', 'offer')->orderBy('id', 'DESC')->get();

        return view('courses.myofferedcourse', ['title' => $pageTitle, 'allrecords' => $allrecords]);
    }

    public function detail(Request $request, $slug = null) {
        $pageTitle = 'View Course Detail';

        $recordInfo = Course::where('slug', $slug)->first();

        $mysavecourses = $this->getSavedCourses();

        if (empty($recordInfo)) {
            return Redirect::to('courses/management');
        }
        $userInfo = array();
        if (isset($recordInfo->User->slug)) {
            $userInfo = User::where('slug', $recordInfo->User->slug)->first();
        }

        $pageTitle = $recordInfo->title;

        $sections = Coursesection::where('course_id', $recordInfo->id)->get();

        $course_id = $recordInfo->id;
        $query = new Review();
        $query = $query->where('status', 1);
        $query = $query->where('course_id', $course_id);


        $coursereviews = $query->orderBy('id', 'DESC')->get();
        //echo '<pre>';print_r($coursereviews);exit;
        return view('courses.detail', ['title' => $pageTitle, 'sections' => $sections, 'recordInfo' => $recordInfo, 'userInfo' => $userInfo, 'mysavecourses' => $mysavecourses, 'coursereviews' => $coursereviews]);
//        return view('courses.detail', ['courseCount' => $courseCount, 'title' => $pageTitle, 'recordInfo' => $recordInfo, 'userInfo' => $userInfo, 'topRatedInfo' => $topRatedInfo, 'sellingOrders' => $sellingOrders, 'coursereviews' => $coursereviews]);
    }

    public function coursedashboard(Request $request, $slug = null) {
        $pageTitle = 'View Course Detail';

        $recordInfo = Course::where('slug', $slug)->first();

        $mysavecourses = $this->getSavedCourses();

        if (empty($recordInfo)) {
            return Redirect::to('my-courses');
        }
        $userInfo = array();
        if (isset($recordInfo->User->slug)) {
            $userInfo = User::where('slug', $recordInfo->User->slug)->first();
        }

        $sections = Coursesection::where('course_id', $recordInfo->id)->get();
        
        $myorderInfo = array();

        $itemsInfo = Orderitem::where('course_id', $recordInfo->id)->where('buyer_id', Session::get('user_id'))->first();
        if(isset($itemsInfo->order_id) && $itemsInfo->order_id>0){
            $myorderInfo = Myorder::where('id', $itemsInfo->order_id)->first();
        }
        $oldRatingInfo = array();     
        if(isset($myorderInfo->id)){
            $oldRatingInfo = Review::where(['otheruser_id' => Session::get('user_id'), 'myorder_id' => $myorderInfo->id])->first();
        }
            

        $buyerId = Session::get('user_id');
        $sellerId = isset($itemsInfo->seller_id)?$itemsInfo->seller_id:0;
        $selleruser = isset($itemsInfo->Seller->first_name)?$itemsInfo->Seller->first_name . ' ' . $itemsInfo->Seller->last_name:'';
        $courseId = $recordInfo->id;
        $title = $recordInfo->title;

        if (!empty($request->all())) {
            $request->validate([
                'comment' => 'required'
            ]);
            $serialisedData = array();
            $serialisedData['otheruser_id'] = isset($myorderInfo->buyer_id)?$myorderInfo->buyer_id:'';
            $serialisedData['user_id'] = $sellerId;
            $serialisedData['as_a'] = 'seller';
            $serialisedData['myorder_id'] = isset($myorderInfo->id)?$myorderInfo->id:'';
            $serialisedData['servicesoffer_id'] = 0;
            $serialisedData['rating'] = $request->get('rating');
            $serialisedData['comment'] = $request->get('comment');
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(10));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Review::insert($serialisedData);

            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;


            $emailId = isset($itemsInfo->Seller->email_address)?$itemsInfo->Seller->email_address:'';
            if($emailId !=''){
                $emailTemplate = DB::table('emailtemplates')->where('id', 17)->first();
                $toRepArray = array('[!username!]', '[!title!]', '[!loginuser!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($selleruser, $title, $loginuser, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
            }
                
            if(isset($myorderInfo->id)){
                Myorder::where('id', $myorderInfo->id)->update(array('is_buyer_rate' => 1));
            }
                
            $this->updateUserRating($sellerId, 'seller');

            Session::flash('success_message', "You have successfully give review rating to the seller.");
            return Redirect::to('course-dashboard/' . $slug);
        }

        $pageTitle = $recordInfo->title;
        return view('courses.coursedashboard', ['title' => $pageTitle, 'myorderInfo' => $myorderInfo, 'sections' => $sections, 'recordInfo' => $recordInfo, 'userInfo' => $userInfo, 'mysavecourses' => $mysavecourses, 'oldRatingInfo' => $oldRatingInfo]);
    }

    public function addwaitlist(Request $request) {
        $this->getSession();

        echo $user_id = $request->get('user_id');
        echo $course_id = $request->get('course_id');

        $courseInfo = User::where('id', $user_id)->first();
        $waitlist = $courseInfo->waitlist;

        if ($waitlist) {
            $wait = explode(',', $waitlist);
            array_push($wait, Session::get('user_id'));
            $wait1 = implode(',', $wait);
        } else {
            $wait1 = Session::get('user_id');
        }


        Course::where('id', $course_id)->update(array('waitlist' => $wait1));
        exit;
    }

    public function createoffer(Request $request) {
        $pageTitle = 'Create a new Course';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();
        $input = Input::all();

        $user_id = Session::get('user_id');
        if (!empty($input)) {

            $recordInfo = Course::where('id', $input['select_course'])->first();

            $serialisedData['id'] = '';
            $serialisedData['basic_description'] = $input['description'];
            $serialisedData['basic_price'] = $input['basic_price'];
            $serialisedData['basic_delivery'] = $input['basic_delivery'];
            $serialisedData['expiry'] = $input['expiry'];
            $serialisedData['one_delivery'] = 1;
            $serialisedData['standard_title'] = '';
            $serialisedData['standard_description'] = '';
            $serialisedData['standard_delivery'] = '';
            $serialisedData['standard_revision'] = '';
            $serialisedData['standard_price'] = '';
            $serialisedData['premium_title'] = '';
            $serialisedData['premium_description'] = '';
            $serialisedData['premium_delivery'] = '';
            $serialisedData['premium_revision'] = '';
            $serialisedData['premium_price'] = '';
            $serialisedData['title'] = $recordInfo->title;
            $serialisedData['category_id'] = $recordInfo->category_id;
            $serialisedData['subcategory_id'] = $recordInfo->subcategory_id;
            $serialisedData['tags'] = $recordInfo->tags;
            $serialisedData['description'] = $recordInfo->description;
            $serialisedData['photo'] = $recordInfo->photo;
            $serialisedData['youtube_url'] = $recordInfo->youtube_url;
            $serialisedData['youtube_image'] = $recordInfo->youtube_image;
            $serialisedData['pdf_doc'] = $recordInfo->pdf_doc;

            $slug = $this->createSlug($recordInfo->title, 'courses');
            $serialisedData['slug'] = $slug;
            $serialisedData['user_id'] = $user_id;
            $serialisedData['type_course'] = 'offer';
            $serialisedData['offer_user'] = $input['offer_user'];

            $userInfo = User::where('id', $input['offer_user'])->first();
            Course::insert($serialisedData);

            $courseId = DB::getPdo()->lastInsertId();

            if ($recordInfo->Image) {
                foreach ($recordInfo->Image as $courseimage) {
                    if (isset($courseimage->name) && !empty($courseimage->name)) {
                        $path = GIG_FULL_UPLOAD_PATH . $courseimage->name;
                        if (file_exists($path) && !empty($courseimage->name)) {
                            $uploadedFileName = $courseimage->name;
                            $uploadedFileNew = $courseimage->name . '-' . time();
                            $success = \File::copy(GIG_FULL_UPLOAD_PATH . '/' . $uploadedFileName, GIG_FULL_UPLOAD_PATH . '/' . $uploadedFileNew);

                            $this->resizeImage($uploadedFileNew, GIG_FULL_UPLOAD_PATH, GIG_SMALL_UPLOAD_PATH, GIG_MW, GIG_MH);

                            $serialisedImgData = array();

                            $serialisedImgData['course_id'] = $courseId;
                            $serialisedImgData['name'] = $uploadedFileName;
                            $serialisedImgData['status'] = 1;
                            $serialisedImgData['main'] = 0;

                            Image::insert($serialisedImgData);
                        }
                    }
                }
            }

            $name = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $username = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $input['basic_price'];
            $duedate = date('d M Y', strtotime($input['expiry']));
            $item = $recordInfo->title;
            $emailId = $userInfo->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 22)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!duedate!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $duedate, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Course details saved successfully.");
            return Redirect::to('courses/myofferedcourse');
        }
    }

    public function acceptreject(Request $request, $type, $slug) {
        if ($type == 1) {
            $pageTitle = 'Accept Offer';
            $recordInfo = Course::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('courses')->where('id', $recordInfo->id)->update(array('offer_status' => 1));

            $username = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $name = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $recordInfo->User->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 23)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer accepted successfully.");
            return Redirect::to('courses/offeredcourse');
        } elseif ($type == 2) {
            $pageTitle = 'Reject Offer';
            $recordInfo = Course::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('courses')->where('id', $recordInfo->id)->update(array('offer_status' => 2));

            $username = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $name = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $recordInfo->User->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 24)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer rejected successfully.");
            return Redirect::to('courses/offeredcourse');
        } elseif ($type == 3) {
            $pageTitle = 'Withdrawn Offer';
            $recordInfo = Course::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('courses')->where('id', $recordInfo->id)->update(array('offer_status' => 3));

            $name = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $username = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $userInfo->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 25)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer rejected successfully.");
            return Redirect::to('courses/myofferedcourse');
        }
    }

}

?>