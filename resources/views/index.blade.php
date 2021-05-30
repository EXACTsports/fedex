@extends("fedex::layouts.app")

@section('content')
    <div class="filters">
        @livewire('fedex::date-picker', ['label' => 'Effective Date'])
    </div>
    <section class="main"></section>
@endsection