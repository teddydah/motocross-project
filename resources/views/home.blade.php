@extends('layouts.main')

@section('title')
    Auribail Mx Park
@endsection

@section('header')
    @include('includes.home.header')
@endsection

@section('main')
    @include('home.hero')

    @include('home.about')

    @include('home.about_list')

    @include('home.training')

    @include('home.services')

    <!-- Galerie -->
    @include('home.pictures')

    <!--include('home.team')

    include('home.testimonials')-->

    <!-- Formulaire de contact -->
    @include('home.contact')
@endsection
