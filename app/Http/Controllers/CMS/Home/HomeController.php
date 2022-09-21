<?php

namespace App\Http\Controllers\CMS\Home;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
    use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Course;
use App\Models\Section;
use App\Models\Lecture;

class HomeController extends Controller
{
    public function Home(Request $request)
    {

        if (empty(MyAccount()->id)) {
          redirect('/');
        }

        return $this->HomeBase($request);
    }

    public function Index(Request $request)
    {


        if (!empty($_COOKIE['AccessToken'])) {
          header('Location: /home');
          die();
        }
        return $this->HomeBase($request);
    }

    public function HomeBase(Request $request)
    {
        $Course = Course::all();
        return view('app.home.index',[
          'course' => $Course
        ]);
    }

    public function Dashboard(Request $request)
    {

        return view('app.dashboard.index');
    }

    public function Signup(Request $request)
    {
        if (!empty($_COOKIE['AccessToken'])) {
          header('Location: /home');
          die();
        }

        return view('app.signup.index');
    }

    public function Contact(Request $request)
    {

        return view('app.contact.index');
    }

    public function AboutUs(Request $request)
    {

        return view('app.about_us.index');
    }

    public function Courses(Request $request, $id)
    {

        $Course = Course::all();
        return view('app.courses.index',[
          'course' => $Course
        ]);

    }

    public function Course(Request $request, $id)
    {

        $Course = Course::where('id', $id)->first();

        $Section = Section::where('course_id', $id)
                    ->with('lecture')
                    ->get();

        return view('app.course.index', [
          'course' => $Course,
          'section' => $Section
        ]);
    }

    public function Lecture(Request $request, $id)
    {

          $Lecture = Lecture::where('id', $id)
                      ->with('section')
                      ->with('foto_lecture')

                      ->first();



          $Section = Section::where('course_id', $Lecture->section->course_id)
                      ->with('lecture')
                      ->get();


          return view('app.lecture.index', [
            'id' => $id,
            'section' => $Section,
            'lecture' => $Lecture
          ]);

    }

    public function Question(Request $request)
    {

        return view('app.question.index');
    }

    public function Profile(Request $request, $id = '')
    {

        return view('app.profile.index');
    }
}
