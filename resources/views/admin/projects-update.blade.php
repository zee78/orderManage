@extends('admin.layouts.master')

@section('title') Update Order @endsection

@section('css') 
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
<!-- dropzone css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/assets/libs/dropzone/min/dropzone.min.css')}}">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/chosen.css') }}">
<style>
  .chosen-container-multi .chosen-choices{
    height: calc(1.5em + .94rem + 2px);
    border-radius: .25rem;
  }
  .chosen-container-multi .chosen-choices li.search-choice{
    line-height: 20px;
  }
  /* Chosen Style */
  
  .select2-container .select2-selection--single{
    height: 36px;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
  }
</style>
@endsection

@section('content')

@component('admin.common-components.breadcrumb')
@slot('title') Update @endslot
@slot('li_1') Order @endslot
@slot('li_2') Update @endslot
@endcomponent 
<?php 
  $require_things = array('Turban','Sherwani','Inner Suit','Shawal', 'Waist Coat','Prince Coat','Khussa/Shoes');
  $requirements= explode(',',$getSingleData->need_deliver);
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Update Order</h4>
        <form id="updateProjectForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$getSingleData->id}}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectname" class="col-form-label">Customer Name:</label>
                <input id="projectname" name="customer_name" type="text" class="form-control" value="{{$getSingleData->customer_name}}" placeholder="Enter Customer Name...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="category" class="col-form-label">Contact Number:</label>
                <input type="number" name="customer_contact" class="form-control" placeholder="Contact Number" value="{{$getSingleData->customer_contact}}">          
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="level" class="col-form-label">Booking Date:</label>
                <input type="date" name="booking_date" class="form-control" placeholder="Booking Date" value="{{$getSingleData->booking_date}}">         
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="level" class="col-form-label">Delivery Date:</label>
                <input type="date" name="delivery_date" class="form-control" placeholder="Delivery Date" value="{{$getSingleData->delivery_date}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="level" class="col-form-label">Needs to Deliver:</label><br>
                <div class="d-block mt-2">
                  <!-- @foreach($require_things as $things)
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="need_deliver[]" value="{{$things}}" @foreach($requirements as $key => $value) @if($things == $value) checked @endif @endforeach>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">{{$things}}</label>
                  </div>
                  @endforeach -->
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="turban" value="{{$getSingleData->turban == 'on' ? 'on' : ''}}" {{$getSingleData->turban == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Turban</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="sherwani" value="{{$getSingleData->sherwani == 'on' ? 'on' : ''}}" {{$getSingleData->sherwani == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Sherwani</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="inner_suit" value="{{$getSingleData->inner_suit == 'on' ? 'on' : ''}}" {{$getSingleData->inner_suit == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Inner Suit</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="shawal" value="{{$getSingleData->shawal == 'on' ? 'on' : ''}}" {{$getSingleData->shawal == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Shawal</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="waist_coat" value="{{$getSingleData->waist_coat == 'on' ? 'on' : ''}}" {{$getSingleData->waist_coat == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Waist Coat</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="prince_coat" value="{{$getSingleData->prince_coat == 'on' ? 'on' : ''}}" {{$getSingleData->prince_coat == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Prince Coat</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="khussa_shoes" value="{{$getSingleData->khussa_shoes == 'on' ? 'on' : ''}}" {{$getSingleData->khussa_shoes == 'on' ? 'checked' : ''}}>
                    <label class="form-check-label pl-1" for="inlineCheckbox1">Khussa/Shoes</label>
                  </div>
                </div>        
              </div>
            </div>
          </div>
          
          
          <div class="form-group row mb-4 d-none">
            <label for="level" class="col-form-label col-lg-2">Invoice No:</label>
            <div class="col-lg-10">
              <input type="text" name="invoice_no" class="form-control" placeholder="Invoice" value="{{$getSingleData->invoice_no}}">
            </div>          
          </div>
          <h4>Size & Description</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="length" class="col-form-label">Neck:</label>
                <input type="text" name="neck" class="form-control" placeholder="Neck Size" value="{{$getSingleData->neck}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Shoulder:</label>
                <input type="text" class="form-control" name="shoulder" placeholder="Shoulder Size" value="{{$getSingleData->shoulder}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Arms:</label>
                <input type="text" class="form-control" name="arms" placeholder="Arms Size" value="{{$getSingleData->arms}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Biceps:</label>
                <input type="text" class="form-control" name="biceps" placeholder="Biceps Size" value="{{$getSingleData->biceps}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Chest:</label>
                <input type="text" class="form-control" name="chest" placeholder="Chest Size" value="{{$getSingleData->chest}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Back:</label>
                <input type="text" class="form-control" name="back" placeholder="Back Size" value="{{$getSingleData->back}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Belly:</label>
                <input type="text" class="form-control" name="belly" placeholder="Belly Size" value="{{$getSingleData->belly}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Wc Length:</label>
                <input type="text" class="form-control" name="wc_length" placeholder="Wc Length" value="{{$getSingleData->wc_length}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Pc Length:</label>
                <input type="text" class="form-control" name="pc_length" placeholder="Pc Length" value="{{$getSingleData->pc_length}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Sherwani Length:</label>
                <input type="text" class="form-control" name="sherwani_length" placeholder="Sherwani Length" value="{{$getSingleData->sherwani_length}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Kurta Length:</label>
                <input type="text" class="form-control" name="kurta_length" placeholder="Kurta Length" value="{{$getSingleData->kurta_length}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Waist:</label>
                <input type="text" class="form-control" name="waist" placeholder="Waist" value="{{$getSingleData->waist}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Hips:</label>
                <input type="text" class="form-control" name="hips" placeholder="Hips" value="{{$getSingleData->hips}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Thigh:</label>
                <input type="text" class="form-control" name="thigh" placeholder="Thigh" value="{{$getSingleData->thigh}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Knee:</label>
                <input type="text" class="form-control" name="knee" placeholder="Knee" value="{{$getSingleData->knee}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Calf:</label>
                <input type="text" class="form-control" name="calf" placeholder="Calf" value="{{$getSingleData->calf}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Botton:</label>
                <input type="text" class="form-control" name="botton" placeholder="Botton" value="{{$getSingleData->botton}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Length:</label>
                <input type="text" class="form-control" name="length" placeholder="Length" value="{{$getSingleData->length}}">
              </div>
            </div>
          </div>
    
          <h4>Referance</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Color:</label>
                <input type="text" class="form-control" name="ref_color" placeholder="Color" value="{{$getSingleData->ref_color}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectdesc" class="col-form-label">Referance Design:</label>
                <input type="text" class="form-control" name="ref_design" placeholder="Design" value="{{$getSingleData->ref_design}}">
              </div>
            </div>
          </div>
          
          
          <div class="row mb-4">
            <label class="col-form-label col-lg-2">Referance Pictures</label>
            <div class="col-lg-10">
              <input name="ref_images[]" form="updateProjectForm"  type="file" multiple />
            </div>
          </div>
        </form>
        
        <h4>Price</h4>
        <div class="form-group row mb-4">
          <label for="projectdesc" class="col-form-label col-lg-2">Order Price:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" form="updateProjectForm" name="order_price" placeholder="Price" id="orderPrice" value="{{$getSingleData->order_price}}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="projectdesc" class="col-form-label col-lg-2">Advance Amount:</label>
          <div class="col-lg-10">
            <input type="text" form="updateProjectForm" class="form-control" name="advance_amount" placeholder="Advance Amount" id="advanceAmount" value="{{$getSingleData->advance_amount}}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="projectdesc" class="col-form-label col-lg-2">Balance Amount:</label>
          <div class="col-lg-10">
            <input type="text" form="updateProjectForm" class="form-control" name="balance_amount" placeholder="Balance Amount" id="balanceAmount" value="{{$getSingleData->balance_amount}}" readonly>
          </div>
        </div>
        <h4>Order Description</h4>
        <div class="form-group row mb-4">
          <label for="projectdesc" class="col-form-label col-lg-2">Order Description:</label>
          <div class="col-lg-10">
            <textarea name="order_desc" class="form-control" form="updateProjectForm" placeholder="Order Description" rows="5">{{$getSingleData->order_desc}}</textarea>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-lg-10">
            <button type="submit" form="updateProjectForm" class="btn btn-primary">Create Order</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end row -->

@endsection

@section('script')

<!-- bootstrap datepicker -->
<script src="{{ URL::asset('admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('admin-assets/assets/libs/dropzone/min/dropzone.min.js')}}"></script> 
<script src="{{ URL::asset('admin-assets/assets/js/jqueryvalidate/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('admin-assets/assets/js/jqueryvalidate/additional-methods.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/chosen.jquery.js') }}"></script>
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('.select2').select2();

  var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      jQuery(selector).chosen(config[selector]);
  }
  function jobType(select){
    if(select.value == 'hourly'){
      $('#hourly_price').removeClass('d-none');
      $('#fixed_price').addClass('d-none');
    }else{
      $('#fixed_price').removeClass('d-none');
      $('#hourly_price').addClass('d-none');
    }
  }

  // var input = document.querySelector("#phone");

  $("#updateProjectForm").validate({


      errorPlacement:function (error , element) {
        error.insertAfter(element.parents(".form-group .col-lg-10"))
      },
          rules: {
              customer_name: {
                  required: true,
                  // lettersonly: true
              },
              customer_contact: {
                  required: true,
                  // lettersonly: true
              },
              booking_date: {
                  required: true,
                  // email: true
              },
              delivery_date: {
                  required: true,
                  // number: true
              },
              neck: {
                  required: true,
                  
              },
              shoulder: {
                  required: true,  
              },
              arms: {
                  required: true,  
              },
              biceps: {
                  required: true,  
              },
              chest: {
                  required: true,  
              },
              back: {
                  required: true,  
              },
              belly: {
                  required: true,  
              },
              wc_length: {
                  required: true,  
              },
              pc_length: {
                  required: true,  
              },
              sherwani_length: {
                  required: true,  
              },
              kurta_length: {
                  required: true,  
              },
              waist: {
                  required: true,  
              },
              hips: {
                  required: true,  
              },
              thigh: {
                  required: true,  
              },
              knee: {
                  required: true,  
              },
              calf: {
                  required: true,  
              },
              botton: {
                  required: true,  
              },
              length: {
                  required: true,  
              },
              ref_color: {
                  required: true,  
              },
              ref_design: {
                  required: true,  
              },
              order_price: {
                  required: false,  
              },
              advance_amount: {
                  required: true,  
              },
              balance_amount: {
                  required: true,  
              },

          },
          messages: {
              customer_name: {
                  required: "Please enter customer name",

              } ,
              customer_contact: {
                  required: "Please enter customer contact",

              } ,
              booking_date: {
                  required: "Please enter booking date",

              } ,
              delivery_date: {
                  required: "Please enter delivery date",
                  // number: "Please enter valid integer",
              } ,
              neck: {
                  required: "Please enter neck size",

              } ,
              shoulder: {
                  required: "Please enter shoulder size",

              } ,
              shoulder: {
                  required: "Please enter shoulder size",

              } ,
              arms: {
                  required: "Please enter arms size",

              } ,
              biceps: {
                  required: "Please enter biceps size",

              } ,
              chest: {
                  required: "Please enter chest size",

              } ,
              back: {
                  required: "Please enter back size",

              } ,
              belly: {
                  required: "Please enter belly size",

              } ,
              wc_length: {
                  required: "Please enter wc length",

              } ,
              pc_length: {
                  required: "Please enter pc length",

              } ,
              sherwani_length: {
                  required: "Please enter sherwani length",

              } ,
              kurta_length: {
                  required: "Please enter kurta length",

              } ,
              waist: {
                  required: "Please enter waist size",

              } ,
              hips: {
                  required: "Please enter hips size",

              } ,
              thigh: {
                  required: "Please enter thigh size",

              } ,
              knee: {
                  required: "Please enter knee size",

              } ,
              calf: {
                  required: "Please enter calf size",

              } ,
              botton: {
                  required: "Please enter botton size",

              } ,
              ref_color: {
                  required: "Please enter Referance color",

              } ,
              ref_design: {
                  required: "Please enter Referance design",

              } ,
              order_price: {
                  required: "please enter order price",  
              },
              advance_amount: {
                  required: "Please enter advance amount",

              } ,
              balance_amount: {
                  required: "Please enter balance amount",

              } ,
          },

          submitHandler: function(form) {
             form_Create(form);
          }

    });


  function form_Create(formData) {
   let createFormData = $('#updateProjectForm').serialize();
// var createFormData = new FormData (formData);
    console.log(createFormData);
    $.ajax({
        url: "{{url('admin/orders/'.$getSingleData->id)}}",
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/orderManage/public/admin/orders/";
                
                
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
$('#advanceAmount').keyup(function(){
   $total = $('#orderPrice').val(); 
   $advance = $(this).val();
   $blance = $total - $advance;
   $('#balanceAmount').val($blance);
});
</script>
@endsection