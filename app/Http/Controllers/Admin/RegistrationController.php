<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
  public function index(Request $request)
  {
    $status = 'waiting';
    if ($request->query('status')) {
      $status = $request->query('status');
    }
    $allowed_status = [
      'non registrant', 'registering', 'waiting', 'registered', 'all', 'canceled', 'unnotified'
    ];
    // return $status;
    if (in_array($status, $allowed_status)) {
      switch ($status) {
        case 'registered':
          $users = User::select('name', 'phone', 'registration_status', 'id', 'get_free', 'notif_status')
            ->where([['registration_status', '=', 'registered'],['role_id', '<', 2]])
            ->orWhere('donor', '=', 1)
            ->paginate(50)->appends($request->all());
            // ->get();
          break;
        
        case 'unnotified':
          $users = User::select('name', 'phone', 'registration_status', 'id', 'get_free', 'notif_status')
            ->whereNotIn('notif_status', ['success'])
            ->paginate(50)->appends($request->all());
          break;

        default:
        $users = User::select('name', 'phone', 'registration_status', 'id', 'get_free', 'notif_status')
          ->when($status != 'all', function ($query) use ($status) {
            return $query->where('registration_status', '=', $status);
          })
          ->where('role_id', '<', 2)
          ->paginate(50)->appends($request->all());
          // ->get();
          break;
      }

      // return $users->total();
      return view('admin.registrationManager', compact('users', 'status'));
    } else {
      abort(404);      
    }
  }


  public function showUser($id)
  {
    $user = User::with(['registration' => function ($query) {
        $query->orderBy('created_at', 'desc');
      }])
      ->find($id);
    
    $message = Message::where('user_id', '=', $id)
      ->leftJoin('users', 'users.id', '=', 'messages.resent_by')
      ->select('messages.*', 'users.id as sender_id', 'users.name as sender_name')
      ->orderBy('messages.updated_at', 'desc')
      ->first();

      // return $message;
    return view('admin.showUser', compact('user', 'message'));
  }


  public function statusUpdate(Request $request)
  {
    $id = $request->id;
    $user = User::find($id);

    if (!$user->get_free) {
      $message = __('woonotif.registered', ['name'=>$user->name, 'telegram'=>'http://bit.ly/shirahshahabiyah1']);
    } else {
      $message = __('woonotif.donated', ['name'=>$user->name, 'link'=>'https://shirah.7perempuan.com/confirmation/?id='.$user->phone]);
    }

    $updated = User::where('id','=', $id)
        ->update([
          'registration_status' => 'registered',
      ]);

    // send WhatsApp Message
    $token = config('app.woonotif_token');
    $data = array(
      'phone_no' => '+'.$user->phone, 
      'key' => $token, 
      'message' => $message
    );

    $data_string = json_encode($data);

    $ch = curl_init('http://send.woonotif.com/api/send_message');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
        )
    );
    $result = curl_exec($ch);
    
    User::where('id','=', $id)
        ->update([
          'notif_status' => $result
    ]);

    Message::updateOrCreate(
      ['user_id'=>$id],
      [
        'message'=>$message,
        'resent'=>0,
        'resent_by'=>null
      ]
    );

    return redirect(route('admin.dashboard'))->with('success', "Update tersimpan");
  }

  public function messageResent(Request $request)
  {
    // return $request;
    $user = User::find($request->id);
    $user->notif_status = 'resent';
    $user->save();

    $message = Message::where('user_id', $request->id)
    ->update([
      'resent' => 1,
      'resent_by' => Auth::id()
    ]);

    return redirect(route('admin.dashboard').'?status=unnotified');
  }
}
