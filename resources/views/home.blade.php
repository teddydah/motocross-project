@extends('layouts.main')

@section('title')
    Auribail Mx Park
@endsection

@section('header')
    @include('includes.home.header')
@endsection

@section('main')
    @include('home.carousel')

    @include('home.about')

    @include('home.training')

    @include('home.circuit')

    @include('home.pictures')

    @include('home.contact')
@endsection
