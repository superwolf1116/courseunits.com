<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Mail;
use DB;
use Session;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\Myorder;

class HomesController extends Controller {

    public function index() {

        $pageTitle = 'Welcome';

        $categorylist = Category::where('status', 1)->where('parent_id', 0)->orderBy('name', 'ASC')->limit(7)->pluck('name', 'id')->all();

        $mysavecourses = $this->getSavedCourses();


        if (Session::get('user_id')) {

            $courseslist = array();
            $courseslist = Course::where(['status' => 1])->orderBy('id', 'ASC')->get();


            $loginuser = User::where(['id' => Session::get('user_id')])->first();
            return view('homes.loginindex', ['title' => $pageTitle, 'loginuser' => $loginuser, 'mysavecourses' => $mysavecourses, 'courseslist' => $courseslist, 'categorylist' => $categorylist]);
        } else {

            $courseslist = array();
            $courses = Course::where(['status' => 1])->orderBy('id', 'ASC')->get();
            if ($courses) {
                foreach ($courses as $course) {
                    $courseslist[$course->category_id][] = $course;
                }
            }
            //           $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
            return view('homes.index', ['title' => $pageTitle, 'fixheader' => 1, 'mysavecourses' => $mysavecourses, 'courseslist' => $courseslist, 'categorylist' => $categorylist]);
        }
    }

    public function home() {
        $pageTitle = 'Welcome';
    }

    public function updatedata() {
        /* $pageTitle = __('message.Update Data');


          // MySQL host
          $mysql_host = 'localhost';
          // MySQL username
          $mysql_username = 'lsgigger_user';
          // MySQL password
          $mysql_password = 'lsgigger_pass';
          // Database name
          $mysql_database = 'lsgigger_db';

          // Connect to MySQL server
          $con = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
          // Check connection
          if ($con -> connect_errno) {
          echo "Failed to connect to MySQL: " . $con -> connect_error;
          exit();
          }
          //mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
          // Select database
          //mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

          $con->query('SET foreign_key_checks = 0');
          if ($result = $con->query("SHOW TABLES"))
          {
          while($row = $result->fetch_array(MYSQLI_NUM))
          {
          $con->query('DROP TABLE IF EXISTS '.$row[0]);
          }
          }

          $con->query('SET foreign_key_checks = 1');

          // Name of the file
          $filename = 'public/files/document/gigger.sql';
          // Temporary variable, used to store current query
          $templine = '';
          // Read in entire file
          $lines = file($filename);
          // Loop through each line
          foreach ($lines as $line) {
          // Skip it if it's a comment
          if (substr($line, 0, 2) == '--' || $line == '')
          continue;

          // Add this line to the current segment
          $templine .= $line;
          // If it has a semicolon at the end, it's the end of the query
          if (substr(trim($line), -1, 1) == ';') {
          // Perform the query
          $con -> query($templine) or print('Error performing query \'<strong>' . '\': ' . $con -> error . '<br /><br />');
          // Reset temp variable to empty
          $templine = '';
          }
          }
          DB::table('settings')->where('id', 1)->update(array('nextupdate' => date('Y-m-d 00:00:00', strtotime('+1 day')))); */
        echo 1;
        exit;
    }

    public function categories() {
        $pageTitle = 'Expore Jobs by Categories';
        $categories = DB::table('categories')->where(['status' => 1, 'parent_id' => 0])->get();
        return view('homes.categories', ['title' => $pageTitle, 'categories' => $categories]);
    }

    public function sendmail() {
        $uname = array('uname' => 'dinesh');
        Mail::send('emails.welcome', $uname, function($message) use ($uname) {
            $message->setSender(array('dinesh.dhaker@logicspice.com' => 'Demo'));
            $message->setFrom(array('dinesh.dhaker@logicspice.com' => 'Demo'));
            $message->to('dinesh.dhaker@logicspice.com', 'John Smith')->subject('Welcome!');
        });
        $email_address = 'dinesh.dhaker@logicspice.com';
        if (count(Mail::failures()) > 0) {
            echo $errors = 'Failed to send password reset email, please try again.';
            foreach (Mail::failures() as $email_address) {
                echo " - $email_address <br />";
            }
        }
        echo 'ff';
    }

}

?>