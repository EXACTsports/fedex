@extends("fedex::layouts.app")

@section('content')
    {{ csrf_field() }}
    @livewire('fedex::upload-file')
@endsection