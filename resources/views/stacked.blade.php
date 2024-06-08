@extends('layout.main')

@section('menu')
<li> <a href="/">Home page</a></li>
@endsection

@push('submenu')
<li> <a href="/">Test page</a></li>
@endpush

@prepend('submenu')
<li> <a href="/">Test page1</a></li>
@endprepend