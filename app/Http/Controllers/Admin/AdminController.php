<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsers;
use App\Http\Requests\UpdateUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Job;
use App\Models\Admin;
use App\Models\Countries;
use Hash;
use Session;
use Mail;
use Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $freelancers = Admin::get();
        return View::make('admin.freelancers-list')->with([
            'freelancers' => $freelancers
        ]);
    }
    public function adminLogin(Request $request)
    {
      if($request->isMethod('post')){
         if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])){
      //Authentication passed...
      if(Auth::guard('admin')->check()){
          // dd(Auth::guard('tech')->user()->name );
        $freelancers = Admin::get();
        return View::make('admin.freelancers-list')->with([
            'freelancers' => $freelancers
        ]);
          // return redirect(RouteServiceProvider::ADMIN);

              }
          }
      }
      return view('admin.auth.login');
    }

    // Clients List
    public function clientsList(Request $request){
        $clients = Admin::get();
        return View::make('admin.clients-list')->with([
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $countries = Countries::get();
      return \View::make('admin.user-create')->with([
        "countries" => $countries
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
      $validatedData = $request->validated();
      $user = new User;
      $user->first_name = $validatedData['first_name'];
      $user->last_name = $validatedData['last_name'];
      $user->username = $validatedData['username'];
      $user->email = $validatedData['email'];
      $user->account_type = $validatedData['account_type'];
      $full_number = str_replace('+','',$request->input('full'));
      $country_code = str_replace($request->input('mobile_number'),'',$full_number);
      // dd($country_code);
      $mobile_number = $request->input('mobile_number');
      $country = Countries::where('phonecode',$country_code)->orwhere('phonecode','+'.$country_code)->first()->name;
      $user->password = Hash::make(trim($validatedData['password']));
      $user->mobile_number = $full_number;
      $user->user_status = 'offline';
      $user->remember_token = $request->input('_token');
      $user->country = $country;
      
      
      if ($user->save()) {
          return response()->json(['status'=>'true' , 'message' => 'User added successfully','userType' => $user->account_type] , 200);
      }else{
           return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
      }
      
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
      $getSingleData = User::find($id);
      
      return \View::make('admin.user-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsers $request, $id)
    {
      $validatedData = $request->validated();
      $findData = User::find($id);

      $findData->first_name = $validatedData['first_name'];
      $findData->last_name = $validatedData['last_name'];
      $findData->username = $validatedData['username'];
      $findData->email = $validatedData['email'];
      $findData->account_type = $validatedData['account_type'];
      $full_number = str_replace('+','',$request->input('full'));
      $country_code = str_replace($request->input('mobile_number'),'',$full_number);
      // dd($country_code);
      $mobile_number = $request->input('mobile_number');
      $country = Countries::where('phonecode',$country_code)->orwhere('phonecode','+'.$country_code)->first()->name;
      $findData->password = Hash::make(trim($validatedData['password']));
      $findData->mobile_number = $full_number;
      $findData->user_status = 'offline';
      $findData->remember_token = $request->input('_token');
      $findData->country = $country;
      
      
      if ($findData->save()) {
          return response()->json(['status'=>'true' , 'message' => 'User updated successfully','userType' => $findData->account_type] , 200);
      }else{
           return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleteData = User::find($id);
      if($deleteData->delete()){
          return response()->json(['status'=>'true' , 'message' => 'User deleted successfully'] , 200);

      }else{
          return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

      }
    }

    public function live()
    {
        return "";
    }
}
