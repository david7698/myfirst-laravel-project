@extends('layouts.template')

@section('title','Calciatori')

@section('content')

@foreach($players as $ruolo => $nome)

@include('user.calciatore')

@endforeach

@endsection


@push('scripts')
<script>alert('ciao');</script>
@endpush
