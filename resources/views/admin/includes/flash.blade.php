@php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warnings = Session::get('warning');
@endphp

@if ($errors)
    @if (is_array($errors))
        @foreach($errors as $key => $value)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ $value }}
            </div>
        @endforeach
    @else
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Error!</strong> {{ $errors }}
        </div>
    @endif
@endif

@if ($messages)
    @if (is_array($messages))
        @foreach($messages as $key => $value)
            <div class="alert alert-success alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Success!</strong> {{ $value }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Success!</strong> {{ $messages }}
        </div>
    @endif
@endif

@if ($info)
    @if (is_array($info))
        @foreach($info as $key => $value)
            <div class="alert alert-info alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Info!</strong> {{ $value }}
            </div>
        @endforeach
    @else
        <div class="alert alert-info alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Info!</strong> {{ $info }}
        </div>
    @endif
@endif

@if ($warnings)
    @if (is_array($warnings))
        @foreach($warnings as $key => $value)
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Warning!</strong> {{ $value }}
            </div>
        @endforeach
    @else
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Warning!</strong> {{ $warnings }}
        </div>
    @endif
@endif
