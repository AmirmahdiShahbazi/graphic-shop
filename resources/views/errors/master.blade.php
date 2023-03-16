@if ($errors->any())
    <div class="alert alert-danger" style="margin-right: 300px;margin-left: 50px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div style="margin-right: 300px;margin-left: 50px;" class="alert alert-success">{{session('success')}}</div>
@endif
@if(session('failed'))
    <div class="alert alert-danger">{{session('failed')}}</div>
@endif

