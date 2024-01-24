@extends('layouts.main')

@section('title')
    Auribail Mx Park
@endsection

@section('main')
    @include('home.hero')

    @include('home.about')

    @include('home.about_list')

    @include('home.counts')

    @include('home.services')

    <!-- Galerie -->
    @include('home.portfolio')

    @include('home.team')

    @include('home.testimonials')

    <!-- Formulaire de contact -->
    @include('home.contact')
@endsection
