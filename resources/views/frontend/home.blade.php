{{-- ============================================================
     Home Page
     Assembles all frontend sections inside the shared layout.
     ============================================================ --}}
@extends('layouts.app')

@section('title', 'Badhon Sheikh | Full Stack Web Developer')
@section('description', 'Portfolio of Badhon Sheikh — Full Stack Web Developer specializing in creating dynamic, user-friendly web applications.')

@section('content')
    @include('frontend.sections.hero')
    @include('frontend.sections.services')
    @include('frontend.sections.about')
    @include('frontend.sections.skills')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.gallery')
    @include('frontend.sections.experience')
    @include('frontend.sections.contact')
    @include('frontend.sections.footer')
@endsection
