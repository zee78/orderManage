@extends('admin.layouts.master')
@section('title') Orders List @endsection
@section('content')
@component('admin.common-components.breadcrumb')
@slot('title') Month Wise Sale @endslot
@slot('li_1') Months Wise SaleOrders @endslot
@slot('li_2') Month Wise Sale @endslot
@endcomponent

<div class="row">
  <div class="col-lg-12">
    <div class="">
      <div class="table-responsive">
        <table id="project-list-table" class="table project-list-table table-nowrap table-centered table-borderless">
          <thead>
            <tr>
              <th scope="col" style="width: 100px">#</th>
              <th scope="col">Month</th>
              <th scope="col">Total Sale</th>
              <th scope="col">Advance Amount</th>
              <th scope="col">Balance Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($months as $key => $sale)
            <tr>
              <td>{{$key+1}}</td>
              <td>
                <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{$sale->monthname}}</a></h5>
              </td>
              <td>RS {{$sale->total_sale}}</td>
              <td>RS {{$sale->advance}}</td>
              <td>RS {{$sale->balance}}</td>
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