@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable margin5 mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success:</strong> {{ $message }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block mt-2">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block mt-2">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block mt-2">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
        <div class="alert alert-danger mt-2">
        <button type="button" class="close" data-dismiss="alert"> &nbsp;×</button>	
        Failed : Please check the form below for errors
        </div>
@endif
