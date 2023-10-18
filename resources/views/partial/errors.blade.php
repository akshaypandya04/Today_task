@if ($errors->any())
    <div class="alert alert-danger">
        <p>Please correct the following errors before proceeding:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger"> {{ session('error') }} </div>
@endif
@if(session('success'))
    <div class="alert alert-success"> {{ session('success') }} </div>
@endif
@if(session('message'))
    <div class="alert alert-info"> {{ session('message') }} </div>
@endif