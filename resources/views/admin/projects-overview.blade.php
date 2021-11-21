@extends('admin.layouts.master')

@section('title') Orders Overview @endsection

@section('content')

   @component('admin.common-components.breadcrumb')
         @slot('title') Order Overview @endslot
         @slot('li_1') Orders @endslot
         @slot('li_2') Order Overview @endslot
     @endcomponent 
                      

    <button type="button" onclick="window.print()" class="btn btn-success d-print-none px-5 rounded-pill mb-3"><i class="fa fa-print pr-2"></i>Print</button>
  <div class="row" id="section-to-print">
      <div class="col-lg-8">
          <div class="card">
              <div class="card-body">
                  <div class="media">
                      <!-- <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm mr-4"> -->

                      <div class="media-body overflow-hidden">
                          <div class="d-flex justify-content-between mb-3">
                            <h5 class="text-truncate font-size-16">Customer Name: </h5>
                            <h5>{{$order->customer_name}}</h5>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <h6 class="text-truncate font-size-14">Customer Contact: </h6>
                            <h6>{{$order->customer_contact}}</h6>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <h6 class="text-truncate font-size-14">Invoice No: </h6>
                            <h6>{{$order->invoice_no}}</h6>
                          </div>
                          <div class="d-block mb-3">
                            <h6 class="text-truncate font-size-14">Client Requirement </h6>
                            <ul class="pl-3">
                              @foreach($requirements as $require)
                              <li><label class="text-capitalize">{{$require}}</label></li>
                              @endforeach
                            </ul>
                            
                          </div>
                          <div class="row task-dates d-print-flex d-print-table-row">
                            <div class="col-lg-4">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> Booking Date</h5>
                                    <p class="text-muted mb-0">{{date('d F Y', strtotime($order->booking_date))}}</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i> Delivery Date</h5>
                                    <p class="text-muted mb-0">{{date('d F Y', strtotime($order->delivery_date))}}</p>
                                </div>
                            </div>
                        </div>

                      </div>
                  </div>

                  <h5 class="font-size-15 mt-4 d-none d-print-block">Size & Description :</h5>

                  <div class="table-responsive d-none d-print-block">
                    <table class="table table-centered">
                      <tbody>
                        <tr>
                          <td><h5 class="font-size-14 m-0">
                            <a href="" class="text-dark">Neck</a></h5></td>
                          <td>
                            <div>
                                <a href="#" class="font-size-14">{{$order->neck}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Shoulder</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->shoulder}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Arms</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->arms}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Biceps</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->biceps}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Chest</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->chest}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Back</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->back}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Belly</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->belly}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Wc Length</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->wc_length}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Pc Length</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->pc_length}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Sherwani Length</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->sherwani_length}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Kurta Length</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->kurta_length}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Waist</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->waist}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Hips</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->hips}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Thigh</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->thigh}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Knee</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->knee}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Calf</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->calf}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Botton</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->botton}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Length</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">{{$order->length}}</a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h5 class="d-none d-print-block">Reference</h5>
                  <div class="table-responsive d-none d-print-block">
                    <table class="table table-centered">
                      <tbody>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Referance Color</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">
                              {{$order->ref_color}}</a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Referance Design</a></h5></td>
                          <td><div>
                              <a href="#" class="font-size-14 text-dark">{{$order->ref_design}}</a></div></td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Referance Pictures</a></h5></td>
                          <td>
                            <img src="{{asset('assets/images/jobs/'.$order->ref_images)}}" style="width: 200px">
                            </td>
                        </tr>
                        <tr>
                          <td><h5 class="font-size-14 m-0"><a href="" class="text-dark">Order Price</a></h5></td>
                          <td>
                            <div>
                              <a href="#" class="font-size-14 text-dark">
                              {{$order->order_price}}</a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>                    
                  </div>
              </div>
          </div>
      </div>
      <!-- end col -->

      
      <!-- end col -->
  </div>
  <!-- end row -->

  
  <!-- end row -->
@endsection

@section('script')

        <!-- apexcharts -->
        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{ URL::asset('assets/js/pages/project-overview.init.js')}}"></script> 
  <script>
    // function printData()
// {
//    var divToPrint=document.getElementById("printTable");
//    newWin= window.open("");
//    newWin.document.write(divToPrint.outerHTML);
//    newWin.print();
//    newWin.close();
// }

// $('button').on('click',function(){
// printData();
// })
function printDiv() {
            var divContents = document.getElementById("section-to-print").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
  </script>
@endsection