@extends('layouts.main')

@section('title')
    Auribail Mx Park
@endsection

@include('includes.hero')

@section('main')
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
