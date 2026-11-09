@extends('layouts.app')

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.pricelist')
    @include('partials.steps')
    @include('partials.faq')
    @include('partials.cta')
@endsection

@push('scripts')
    <script>window.TAROT_CARDS = @json($cards);</script>
    <script src="{{ asset('js/tarot.js') }}"></script>
@endpush
