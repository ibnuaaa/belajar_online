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

        return view('app.home.index');
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

        return view('app.courses.index');
    }

    public function Course(Request $request, $id)
    {

        return view('app.course.index');
    }

    public function Lecture(Request $request, $id)
    {

        if ($id == 3 || $id == 4) {
          return view('app.exercise.index', [
            'id' => $id
          ]);
        } else {
          return view('app.lecture.index', [
            'id' => $id
          ]);
        }
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
