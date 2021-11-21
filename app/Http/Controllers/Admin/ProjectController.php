<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Hash;
use Session;
use Mail;
use Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::orderBy('created_at', 'DESC')->get();
      return View::make('admin.orders-list')->with([
          'orders' => $orders
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View::make('admin.orders-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
      // dd(auth()->user());
      $validatedData = $request->validated();
    
      $order = new Order();
      $order->posted_by = auth()->user()->name;
      $order->customer_name = $validatedData['customer_name'];
      $order->customer_contact = $validatedData['customer_contact'];
      $order->booking_date = $validatedData['booking_date'];
      $order->delivery_date = $validatedData['delivery_date'];;
      $order->invoice_no = $validatedData['invoice_no'];
      $order->neck = $validatedData['neck'];
      $order->shoulder = $validatedData['shoulder'];
      $order->arms = $validatedData['arms'];
      $order->biceps = $validatedData['biceps'];
      $order->chest = $validatedData['chest'];
      $order->back = $validatedData['back'];
      $order->belly = $validatedData['belly'];
      $order->wc_length = $validatedData['wc_length'];
      $order->pc_length = $validatedData['pc_length'];
      $order->sherwani_length = $validatedData['sherwani_length'];
      $order->kurta_length = $validatedData['kurta_length'];
      $order->waist = $validatedData['waist'];
      $order->hips = $validatedData['hips'];
      $order->thigh = $validatedData['thigh'];
      $order->knee = $validatedData['knee'];
      $order->calf = $validatedData['calf'];
      $order->botton = $validatedData['botton'];
      $order->length = $validatedData['length'];
      $order->ref_color = $validatedData['ref_color'];
      $order->ref_design = $validatedData['ref_design'];
      $order->order_price = $validatedData['order_price'];
      
      $images=array();
      if($files=$request->file('ref_images')){
        foreach($files as $file){
          
          $imagename= 'job-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
          $extension= $file->getClientOriginalExtension();
          // $imagename= $filename;
          $destinationpath= public_path('assets/images/jobs/');
          $file->move($destinationpath, $imagename);

          $images[]=$imagename;
        }
      }

      $order->ref_images = implode(",",$images);
     
      if ($order->save()) {
          return response()->json(['status'=>'true' , 'message' => 'Order created successfully'] , 200);
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
      $order = Order::find($id);
      return View::make('admin.projects-overview')->with([
        'order' => $order
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $getSingleData = Order::find($id);
      return \View::make('admin.projects-update')->with([
        "getSingleData" => $getSingleData
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, $id)
    {
      // dd($request->all());
      $validatedData = $request->validated();
    
      $order = Order::find($id);
      // dd($job);
      $order->posted_by = auth()->user()->name;
      $order->customer_name = $validatedData['customer_name'];
      $order->customer_contact = $validatedData['customer_contact'];
      $order->booking_date = $validatedData['booking_date'];
      $order->delivery_date = $validatedData['delivery_date'];;
      $order->invoice_no = $validatedData['invoice_no'];
      $order->neck = $validatedData['neck'];
      $order->shoulder = $validatedData['shoulder'];
      $order->arms = $validatedData['arms'];
      $order->biceps = $validatedData['biceps'];
      $order->chest = $validatedData['chest'];
      $order->back = $validatedData['back'];
      $order->belly = $validatedData['belly'];
      $order->wc_length = $validatedData['wc_length'];
      $order->pc_length = $validatedData['pc_length'];
      $order->sherwani_length = $validatedData['sherwani_length'];
      $order->kurta_length = $validatedData['kurta_length'];
      $order->waist = $validatedData['waist'];
      $order->hips = $validatedData['hips'];
      $order->thigh = $validatedData['thigh'];
      $order->knee = $validatedData['knee'];
      $order->calf = $validatedData['calf'];
      $order->botton = $validatedData['botton'];
      $order->length = $validatedData['length'];
      $order->ref_color = $validatedData['ref_color'];
      $order->ref_design = $validatedData['ref_design'];
      $order->order_price = $validatedData['order_price'];
      
      $images=array();
      if($request->file('ref_images') != ''){
        if($files=$request->file('ref_images')){
          foreach($files as $file){
            
            $imagename= 'order-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
            $extension= $file->getClientOriginalExtension();
            // $imagename= $filename;
            $destinationpath= public_path('assets/images/jobs/');
            $file->move($destinationpath, $imagename);

            $images[]=$imagename;
          }
        }
      }else{
        foreach(explode(',',$order->ref_images) as $files){
          $images[]=$files;
        }
      }
      $order->ref_images = implode(",",$images);
     
      if ($order->save()) {
          return response()->json(['status'=>'true' , 'message' => 'Order updated successfully'] , 200);
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
      $deleteData = Order::find($id);
      if($deleteData->delete()){
          return response()->json(['status'=>'true' , 'message' => 'Order deleted successfully'] , 200);

      }else{
          return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

      }
    }
}
