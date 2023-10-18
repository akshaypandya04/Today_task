@extends('layouts.app')
 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __('Product Edit') }}

                    <a class="add_click btn btn-warning" style='float: right;'>Product List</a>

                     </div>

                <div class="card-body">


 @include('partial.errors')

     <div class="card-body" >


           <form method="post" action="{{route('products.update',$products->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $products->name }}" required autocomplete="name" autofocus>

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
                                    <option value="{{$value->id}}" {{(($value->id==$products->category_id) ? 'selected' : '')}}>
                                      {{$value->name}}
                                    </option>
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
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $products->price }}" required>

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
                                <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $products->qty }}" required>

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
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    
     </div>

                    
                </div>
            </div> 


        </div>
    </div>
</div>




@endsection

