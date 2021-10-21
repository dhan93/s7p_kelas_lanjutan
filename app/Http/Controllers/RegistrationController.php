<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Registration;
use App\Models\Message;

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
                if ($user->registration_status != 'non registrant') {
                  return redirect(route('status').'/?id='.$user->phone);
                }
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
      $user = User::find($id);
      if ($user->get_free) {
        $updated = User::where('id','=', $id)
          ->update([
            'registration_status' => 'registered'
          ]);
        $message = __('woonotif.registered', ['name'=>$user->name, 'telegram'=>'http://bit.ly/shirahshahabiyah1']);
          $message .= '\n\n';
          $message .= __('woonotif.donate', ['link'=>'https://shirah.7perempuan.com/confirmation']);
      } else {
        $updated = User::where('id','=', $id)
          ->update([
            'registration_status' => 'registering'
        ]);
        // $message = __('woonotif.registering', ['name'=>$user->name, 'link'=>'https://shirah.7perempuan.com/confirmation/?id='.$user->phone]);
      }

      // send WhatsApp Message
      // $token = config('app.woonotif_token');
      // $data = array(
      //   'phone_no' => '+'.$user->phone, 
      //   'key' => $token, 
      //   'message' => $message
      // );

      // $data_string = json_encode($data);

      // $ch = curl_init('http://send.woonotif.com/api/send_message');
      // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_VERBOSE, 0);
      // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
      // curl_setopt($ch, CURLOPT_TIMEOUT, 15);
      // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      //     'Content-Type: application/json',
      //     'Content-Length: ' . strlen($data_string)
      //     )
      // );
      // $result = curl_exec($ch);
      
      // User::where('id','=', $id)
      //     ->update([
      //       'notif_status' => $result
      // ]);

      // Message::updateOrCreate(
      //   ['user_id'=>$id],
      //   [
      //     'message'=>$message,
      //     'resent'=>0,
      //     'resent_by'=>null
      //   ]
      // );
      
      // return redirect(route('status').'/?id='.$user->phone);
      return redirect('https://mpstore.orderonline.id/kelasistritaatibuhebat');
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

    public function confirmationIndex(Request $request)
    {
      if($request->query('id')){
        $id = $request->query('id');
        $userData = User::where('phone', '=', $id)
          ->first();
        if (!$userData) {
          return redirect(route('confirmation.index'))->with('error', 'Nomor WhatsApp tidak ditemukan.');
        }
        return view('confirmationIndex', compact('userData'));
      } else {
        // return $request;
        return view('confirmationIndex');
      };
    }

    public function confirmationUpdate(Request $request)
    {
      $rules = [
        // phone
        'phone' => 'required|numeric|exists:users,phone',
        // nominal
        'nominal' => 'required|numeric',
        // file
        'image' => 'required|file|mimetypes:image/png,image/jpeg|max:2048',
        // id
        'id' => 'required|exists:users,id'
      ];

      $errorMessage = [
        'required' => 'Kolom :attribute harus diisi.',
        'numeric' => 'Kolom :attribute berisi angka.',
        'file' => 'File :attribute belum terupload',
        'mimetypes' => 'Format file :attribute tidak sesuai',
        'exists' => 'Kolom :attribute tidak valid',
        'max' => 'File :attribute tidak boleh melebihi :max KB',
      ];

      $attributes = [
        'phone' => 'Nomor WhatsApp',
        'nominal' => 'Nominal Transfer',
        'image' => 'Bukti Transfer',
        'id' => 'Nomor WhatsApp'
      ];

      $validated = Validator::make($request->all(), $rules, $errorMessage, $attributes)->validate();

      $file_path = $request->file('image')->store('public/uploads/confirmations');

      $user = User::find($validated['id']);

      if ($user->get_free) {
        $updated = User::find($validated['id'])
        ->update([
          'registration_status' => 'waiting',
          'donor' => 1
        ]);
      } else {
        $updated = User::find($validated['id'])
        ->update([
          'registration_status' => 'waiting'
        ]);
      }
      
      $uploaded = Registration::create([
        'user_id' => $validated['id'],
        'file_path' => $file_path,
        'nominal' => $validated['nominal']
      ]);

      $userData = User::find($validated['id']);

      if ($updated && $uploaded) {
        return redirect(route('status').'/?id='.$userData->phone);
      }
    }

    public function status(Request $request)
    {
      if($request->query('id')){
        $id = $request->query('id');
        $userData = User::where('phone', '=', $id)
          ->first();
        if (!$userData) {
          return redirect(route('confirmation.index'))->with('error', 'Nomor WhatsApp tidak ditemukan.');
        }
        return view('status', compact('userData'));
      } else {
        // return $request;
        return view('statusIndex');
      };
    }
}
