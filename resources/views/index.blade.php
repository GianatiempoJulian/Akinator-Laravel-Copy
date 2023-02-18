@extends('layout')
@section('main-content')

<div class="questionContainer">
    @if ($isQuestion == FALSE)
        <h2>¿Your character is {{ $text }}?</h2>
        <a href="{{ url('correct-answer')}}">Yes</a>
        <a href="{{ url('wrong-answer?n='.$node."&a=0&txt=".$text)}}">No</a>
    @else
        <h2>Is your character a {{ $text }}?</h2>
        <a href="{{ url('index?n='.$nodeYes)}}">Yes</a>
        <a href="{{ url('index?n='.$nodeNo)}}">No</a>
    @endif
</div>

@endsection