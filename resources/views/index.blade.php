@extends("fedex::layouts.app")

@section('content')
    <div class="wrapper">
        @livewire('fedex::upload-file')
        @livewire('fedex::convert-to-pdf')
    </div>
@endsection