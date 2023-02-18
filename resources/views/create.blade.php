@extends('layout')
@section('main-content')

<div>
    <form action="{{ url('store') }}" id="new-entry-form" method="POST">
    @csrf
    <input type="hidden" name='node' value='{{ $_GET['n'] }}'>
    <input type="hidden" name='previousName' value='{{ $_GET['txt'] }}'>
    <h3>NOOO! In who person was you thinking about?</h3>
    <textarea name="name" id="name" cols="30" rows="10" placeholder="Name"></textarea>
    <h3>What has their that {{ $_GET['txt'] }} doesnt has?</h3>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
    <button>Save answer</button>
    </form>
</div>

@endsection