@extends('admin.layouts.master')
@section('title') Month Wise Orders List @endsection
@section('content')
@component('admin.common-components.breadcrumb')
@slot('title') Monthly Data @endslot
@slot('li_1') Monthly Data @endslot
@slot('li_2') Monthly Data @endslot
@endcomponent

<div class="row">
  <div class="col-lg-12">
    <div class="">
        <nav>
          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-jan-tab" data-toggle="tab" href="#nav-jan" role="tab" aria-controls="nav-jan" aria-selected="true">Jan</a>
            <a class="nav-link" id="nav-feb-tab" data-toggle="tab" href="#nav-feb" role="tab" aria-controls="nav-feb" aria-selected="false">Feb</a>
            <a class="nav-link" id="nav-mar-tab" data-toggle="tab" href="#nav-mar" role="tab" aria-controls="nav-mar" aria-selected="false">Mar</a>
            <a class="nav-link" id="nav-apr-tab" data-toggle="tab" href="#nav-apr" role="tab" aria-controls="nav-apr" aria-selected="false">Apr</a>
            <a class="nav-link" id="nav-may-tab" data-toggle="tab" href="#nav-may" role="tab" aria-controls="nav-may" aria-selected="false">May</a>
            <a class="nav-link" id="nav-jun-tab" data-toggle="tab" href="#nav-jun" role="tab" aria-controls="nav-jun" aria-selected="false">Jun</a>
            <a class="nav-link" id="nav-jul-tab" data-toggle="tab" href="#nav-jul" role="tab" aria-controls="nav-jul" aria-selected="false">Jul</a>
            <a class="nav-link" id="nav-aug-tab" data-toggle="tab" href="#nav-aug" role="tab" aria-controls="nav-aug" aria-selected="false">Aug</a>
            <a class="nav-link" id="nav-sep-tab" data-toggle="tab" href="#nav-sep" role="tab" aria-controls="nav-sep" aria-selected="false">Sep</a>
            <a class="nav-link" id="nav-oct-tab" data-toggle="tab" href="#nav-oct" role="tab" aria-controls="nav-oct" aria-selected="false">Oct</a>
            <a class="nav-link" id="nav-nov-tab" data-toggle="tab" href="#nav-nov" role="tab" aria-controls="nav-nov" aria-selected="false">Nov</a>
            <a class="nav-link" id="nav-dec-tab" data-toggle="tab" href="#nav-dec" role="tab" aria-controls="nav-dec" aria-selected="false">Dec</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-jan" role="tabpanel" aria-labelledby="nav-jan-tab">
                <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-feb" role="tabpanel" aria-labelledby="nav-feb-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-mar" role="tabpanel" aria-labelledby="nav-mar-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-apr" role="tabpanel" aria-labelledby="nav-apr-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-may" role="tabpanel" aria-labelledby="nav-may-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-jun" role="tabpanel" aria-labelledby="nav-jun-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-jul" role="tabpanel" aria-labelledby="nav-jul-tab">
            <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-aug" role="tabpanel" aria-labelledby="nav-aug-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-sep" role="tabpanel" aria-labelledby="nav-sep-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-oct" role="tabpanel" aria-labelledby="nav-oct-tab">
              <div class="mt-5">
              <div class="table-responsive">
                <p class="text-center">No order to show for this month</p>  
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-nov" role="tabpanel" aria-labelledby="nav-nov-tab">
            <div class="mt-5">
              <div class="table-responsive">
                <table id="project-list-table" class="table project-list-table table-nowrap table-centered table-borderless">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 100px">#</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Customer Contact</th>
                      <th scope="col">Booking Date</th>
                      <th scope="col">Delivery Date</th>
                      <!-- <th scope="col">Invoive No</th> -->
                      <th scope="col">Order Stutus</th>
                      <!--<th scope="col">Action</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($monthlyData['Nov'] as $key => $order)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{$order->customer_name}}</a></h5>
                      </td>
                      <td>{{$order->customer_contact}}</td>
                      <td class="text-capitalize">{{date('d F Y', strtotime($order->booking_date))}}</td>
                      <td>{{date('d F Y', strtotime($order->delivery_date))}}</td>
                      <!-- <td>{{$order->invoice_no}}</td> -->
                      <?php 
                        $startdate = strtotime(date('Y-m-d'));
                        $enddate = strtotime(date($order->delivery_date));
                        $days = (int)(($enddate - $startdate)/86400);
                        $remain_days = $days;
                       ?>
                      <td>
                        @if($remain_days <= 0)
                        <span class="bg-danger text-white p-1 rounded">Delivery Date Passed</span>
                        @elseif($remain_days <= 5)
                          <span class="bg-danger text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @elseif($remain_days > 5 && $remain_days <= 10)
                          <span class="bg-success text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @else
                          <span class="bg-primary text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @endif
                      </td>
                      
                      <!--<td>-->
                      <!--  <div>-->
                      <!--    <a href="{{url('admin/orders/'.$order->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success rounded"><i class="bx bx-edit"></i></a>-->
                      <!--    <button class="btn btn-primary rounded" data-toggle="modal" onclick="deleteProject({{$order->id}})" data-placement="top" title="Delete"><i class="bx bx-trash-alt"></i></button>-->
                      <!--    <a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-secondary rounded" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>-->
                      <!--  </div>-->
                      <!--</td>-->
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-dec" role="tabpanel" aria-labelledby="nav-dec-tab">
            <div class="mt-5">
              <div class="table-responsive">
                <table id="project-list-table" class="table project-list-table table-nowrap table-centered table-borderless">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 100px">#</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Customer Contact</th>
                      <th scope="col">Booking Date</th>
                      <th scope="col">Delivery Date</th>
                      <!-- <th scope="col">Invoive No</th> -->
                      <th scope="col">Order Stutus</th>
                      <!--<th scope="col">Action</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($monthlyData['Dec'] as $key => $order)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{$order->customer_name}}</a></h5>
                      </td>
                      <td>{{$order->customer_contact}}</td>
                      <td class="text-capitalize">{{date('d F Y', strtotime($order->booking_date))}}</td>
                      <td>{{date('d F Y', strtotime($order->delivery_date))}}</td>
                      <!-- <td>{{$order->invoice_no}}</td> -->
                      <?php 
                        $startdate = strtotime(date('Y-m-d'));
                        $enddate = strtotime(date($order->delivery_date));
                        $days = (int)(($enddate - $startdate)/86400);
                        $remain_days = $days;
                       ?>
                      <td>
                        @if($remain_days <= 0)
                        <span class="bg-danger text-white p-1 rounded">Delivery Date Passed</span>
                        @elseif($remain_days <= 5)
                          <span class="bg-danger text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @elseif($remain_days > 5 && $remain_days <= 10)
                          <span class="bg-success text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @else
                          <span class="bg-primary text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                        @endif
                      </td>
                      
                      <!--<td>-->
                      <!--  <div>-->
                      <!--    <a href="{{url('admin/orders/'.$order->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success rounded"><i class="bx bx-edit"></i></a>-->
                      <!--    <button class="btn btn-primary rounded" data-toggle="modal" onclick="deleteProject({{$order->id}})" data-placement="top" title="Delete"><i class="bx bx-trash-alt"></i></button>-->
                      <!--    <a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-secondary rounded" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>-->
                      <!--  </div>-->
                      <!--</td>-->
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</div>
<!-- Modal effects -->
<div class="modal" id="deleteModel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Alert</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
      </div>
      <form id="deleteData" > 
        @csrf
         @method('DELETE')
      <input type="hidden" name="projectId" id="projectId">
      <div class="modal-body">
        <h6></h6>
        <p>Are you sure you want to delete the record ?</p>
      </div>
      <div class="modal-footer">
        <button class="btn ripple btn-danger" id="confirmDelete" type="submit"> Delete </button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>
<!-- End Modal effects-->
@endsection
@section('script-bottom')
<script>
    $(document).ready(function() {
        $('.project-list-table').DataTable();
    } );
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust().fixedColumns().relayout();
    });
    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $projectId = $("#projectId").val();
    //   console.log($projectId)

         $.ajax({
          url: '/orderManage/public/admin/orders/'+$projectId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{
              
              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/orderManage/public/admin/orders";

              }else{
                  $.notify(response.message , 'error');

              }
          },
          error: (errorResponse)=>{
              $.notify( errorResponse, 'error'  );


          }
      })

    });

    function deleteProject(id) {
      $("#deleteModel").modal('show');
      $("#projectId").val(id);
    }

    const date1 = new Date();
    const date2 = new Date('11/20/2021');
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffDays + " days");
</script>
@endsection