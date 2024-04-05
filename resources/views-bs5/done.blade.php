@extends('layouts.app')
{{--<script>window.location = "/card.leedz/public/dashboard";</script>--}}
@section('content')
    <div class="container my-3">
        <h1 class="text-center">
            @lang($doneText ?? 'wizard::generic.done')
        </h1>
    </div>
@endsection
