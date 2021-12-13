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
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::where('posted_by',auth()->user()->id)->orderBy('created_at', 'DESC')->get();
      
      
      return View::make('admin.orders-list')->with([
          'orders' => $orders
      ]);
    }
    
    public function monthlyData(Request $request){
        $months = Order::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"),DB::raw("sum(order_price) as total_sale"),DB::raw("sum(advance_amount) as advance"),DB::raw("sum(balance_amount) as balance"))
        ->whereYear('created_at', date('Y'))
        ->groupBy('monthname')
        ->get();
        
        return View::make('admin.monthly-sale')->with([
          'months' => $months
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
      $order->posted_by = auth()->user()->id;
      $order->customer_name = $validatedData['customer_name'];
      $order->customer_contact = $validatedData['customer_contact'];
      $order->booking_date = $validatedData['booking_date'];
      $order->delivery_date = $validatedData['delivery_date'];;
      $order->invoice_no = mt_rand( 10000000, 99999999 );
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
      $order->advance_amount = $validatedData['advance_amount'];
      $order->balance_amount = $validatedData['balance_amount'];
      $order->order_desc = $request->input('order_desc');
      $order->turban = $request->input('turban');
      $order->sherwani = $request->input('sherwani');
      $order->inner_suit = $request->input('inner_suit');
      $order->shawal = $request->input('shawal');
      $order->waist_coat = $request->input('waist_coat');
      $order->prince_coat = $request->input('prince_coat');
      $order->khussa_shoes = $request->input('khussa_shoes');
      
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
      // dd($request->input('need_deliver'));
      
     
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
      // dd();
      $requirements= explode(',',$order->need_deliver);
      return View::make('admin.projects-overview')->with([
        'order' => $order,
        'requirements' => $requirements,
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
      // dd($getSingleData);
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
      // dd($order->need_deliver);
      $order->posted_by = auth()->user()->id;
      $order->customer_name = $validatedData['customer_name'];
      $order->customer_contact = $validatedData['customer_contact'];
      $order->booking_date = $validatedData['booking_date'];
      $order->delivery_date = $validatedData['delivery_date'];;
      $order->invoice_no = mt_rand( 10000000, 99999999 );
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
      $order->advance_amount = $validatedData['advance_amount'];
      $order->balance_amount = $validatedData['balance_amount'];
      $order->order_desc = $request->input('order_desc');
      $order->turban = $request->input('turban');
      $order->sherwani = $request->input('sherwani');
      $order->inner_suit = $request->input('inner_suit');
      $order->shawal = $request->input('shawal');
      $order->waist_coat = $request->input('waist_coat');
      $order->prince_coat = $request->input('prince_coat');
      $order->khussa_shoes = $request->input('khussa_shoes');
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

    public function updateStatus(Request $request){
      $getData = Order::find($request->order_id);
      $product_type = $request->product_type;
      // dd($product_type,$getData);
      if($product_type == 'turban'){
        if($getData->turban == 'delivered'){
          $getData->turban = 'on';
        }else{
          $getData->turban = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Turban status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'sherwani'){
        if($getData->sherwani == 'delivered'){
          $getData->sherwani = 'on';
        }else{
          $getData->sherwani = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Sherwani status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'inner_suit'){
        if($getData->inner_suit == 'delivered'){
          $getData->inner_suit = 'on';
        }else{
          $getData->inner_suit = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Inner Suit status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'shawal'){
        if($getData->shawal == 'delivered'){
          $getData->shawal = 'on';
        }else{
          $getData->shawal = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Shawal status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'waist_coat'){
        if($getData->waist_coat == 'delivered'){
          $getData->waist_coat = 'on';
        }else{
          $getData->waist_coat = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Waist Coat status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'prince_coat'){
        if($getData->prince_coat == 'delivered'){
          $getData->prince_coat = 'on';
        }else{
          $getData->prince_coat = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Price Coat status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      if($product_type == 'khussa_shoes'){
        if($getData->khussa_shoes == 'delivered'){
          $getData->khussa_shoes = 'on';
        }else{
          $getData->khussa_shoes = 'delivered';
        }
        if($getData->save()){
            return response()->json(['status'=>'true' , 'message' => 'Khussa/Shoes status updated'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);
        }
      }
      

    }
    
}
