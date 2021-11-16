@extends('admin.layouts.master')
@section('title') Orders List @endsection
@section('content')
@component('admin.common-components.breadcrumb')
@slot('title') Orders List @endslot
@slot('li_1') Orders @endslot
@slot('li_2') Orders List @endslot
@endcomponent

<div class="row">
  <div class="col-lg-12">
    <div class="">
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
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $key => $order)
            <tr>
              <td>{{$key+1}}</td>
              <td>
                <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{$order->customer_name}}</a></h5>
              </td>
              <td>{{$order->customer_contact}}</td>
              <td class="text-capitalize">{{$order->booking_date}}</td>
              <td>{{$order->delivery_date}}</td>
              <!-- <td>{{$order->invoice_no}}</td> -->
              <?php 
                $startdate = strtotime(date('Y-m-d'));
                $enddate = strtotime(date($order->delivery_date));
                $days = (int)(($enddate - $startdate)/86400);
                $remain_days = $days;
               ?>
              <td>
                @if($remain_days <= 5)
                  <span class="bg-danger text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                @elseif($remain_days > 5 && $remain_days <= 10)
                  <span class="bg-success text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                @else
                  <span class="bg-primary text-white p-1 rounded">Remaining {{$remain_days}} days for delivery</span>
                @endif
              </td>
              
              <td>
                <div>
                  <a href="{{url('admin/orders/'.$order->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success rounded"><i class="bx bx-edit"></i></a>
                  <button class="btn btn-primary rounded" data-toggle="modal" onclick="deleteProject({{$order->id}})" data-placement="top" title="Delete"><i class="bx bx-trash-alt"></i></button>
                  <a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-secondary rounded" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
        $('#project-list-table').DataTable();
    } );
    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $projectId = $("#projectId").val();
      console.log($projectId)

         $.ajax({
          url: '/admin/orders/'+$projectId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{
              
              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/admin/orders";

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