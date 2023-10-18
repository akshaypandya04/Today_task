@extends('layouts.app')
 
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>



 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">


 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">




            <div class="card">
                <div class="card-header">{{ __('Product List') }}

                    <a class="add_click btn btn-warning" style='float: right;'>Add</a>

                     </div>

                <div class="card-body">


 @include('partial.errors')

     <div class="card-body" >


    <table id="example" class="table table-striped table-bordered">
          <thead>
<tr>
    <th>No</th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Qty</th>
    <th width="280px">Action</th>

</tr>
          </thead>
          
          <tbody>


           <?php $i = 0 ?>
           @foreach($products as $product)   
           <?php $i++ ?>

<tr>
      <td> {{$i}} </td>      
      <td> {{$product->name}} </td>
      <td>
           @if(!empty($product->Category->name))
                   {{$product->Category->name}}
            @else
              -
            @endif
      </td>      
      <td> {{$product->price }} </td>
      <td> {{$product->qty}}</td>  
   <td>
       <a href="{{route('products.edit', $product->id)}}" data-original-title="Edit" class="edit btn btn-primary btn-sm edit">Edit</a>
       <form method="POST" action="{{ route('products.delete', $product->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>

      </td>
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



  <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


            <form method="POST" action="{{ route('products.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                

                            <select  class="form-control" name="category_id" id="category_id">

                     @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                     @endforeach
                            
                            </select>    


                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="qty" class="col-md-4 col-form-label text-md-end">{{ __('Qty') }}</label>

                            <div class="col-md-6">
                                <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" required>

                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>



                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>






 <script>
 
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
   

 </script>




<script>

    $(function (){
            $('.add_click').click(function (){

            $('#addModal').modal('show');


            });
        });




</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>



@endsection

