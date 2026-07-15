{{-- ============================================================
     Home Page
     Assembles all frontend sections inside the shared layout.
     ============================================================ --}}
@extends('layouts.app')

@section('title', 'Mohammad Badhon | Web Developer & Designer')
@section('description', 'Portfolio of Mohammad Badhon — Web Developer and Designer specializing in Laravel, PHP, and modern front-end development.')

@section('content')
    @include('frontend.sections.hero')
    @include('frontend.sections.services')
    @include('frontend.sections.about')
    @include('frontend.sections.skills')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.gallery')
    @include('frontend.sections.contact')
    @include('frontend.sections.footer')
@endsection
