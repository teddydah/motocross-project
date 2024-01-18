@extends('layouts.main')

@section('main')
    @include('includes.main.about')

    @include('includes.main.about_list')

    @include('includes.main.counts')

    @include('includes.main.services')

    <!-- Galerie -->
    @include('includes.main.portfolio')

    @include('includes.main.team')

    @include('includes.main.testimonials')

    <!-- Formulaire de contact -->
    @include('includes.main.contact')
@endsection
