{{-- ============================================================
     Home Page
     Assembles all frontend sections inside the shared layout.
     ============================================================ --}}
@extends('layouts.app')

@section('title', 'Joy Datta | Graphic Designer')
@section('description', 'Portfolio of Joy Datta — Graphic Designer specializing in branding, UI/UX, and visual communication.')

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
