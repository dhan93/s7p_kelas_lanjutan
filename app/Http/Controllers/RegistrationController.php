<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('registerFront');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      // $url = 'https://www.google.com/recaptcha/api/siteverify';
      // $remoteip = $_SERVER['REMOTE_ADDR'];
      // $data = [
      //         'secret' => config('services.recaptcha.secret'),
      //         'response' => $request->get('recaptcha'),
      //         'remoteip' => $remoteip
      //       ];
      // $options = [
      //         'http' => [
      //           'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      //           'method' => 'POST',
      //           'content' => http_build_query($data)
      //         ]
      //     ];
      // $context = stream_context_create($options);
      //         $result = file_get_contents($url, false, $context);
      //         $resultJson = json_decode($result);

      // if ($resultJson->success != true) {
      //         return back()->withErrors(['captcha' => 'ReCaptcha Error']);
      //         }
      // if ($resultJson->score >= 0.3) {
              //Validation was successful, add your form submission logic here
              // return back()->with('message', 'Thanks for your message!');
              $rules = [
                'phone' => 'required|numeric|exists:users,phone',
              ];

              $errorMessage = [
                'required' => 'Kolom :attribute harus diisi.',
                'exists' => ':attribute yang kamu masukkan tidak terdaftar, silakan coba lagi.',
                'numeric' => 'Kolom :attribute harus berupa angka',
              ];

              $attributes = [
                'phone' => 'No. WhatsApp',
              ];

              $validated = Validator::make($request->all(), $rules, $errorMessage, $attributes)->validate();

              $user = User::where('phone', '=', $request->phone)
                ->first();
                
              if ($user) {
                return view('registerForm', compact('user'));
              }
              return back()->with('error', 'Nomor yang kamu masukkan tidak terdaftar, silakan coba lagi.');
      // } else {
      //        return back()->withErrors(['captcha' => 'ReCaptcha Error']);
      // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('registerForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
