@extends('layouts.app')

@section('title', 'Diagnostic')


@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Diagnostic</h1>
        </div>
    </div><!-- End Page Title -->
    <div class="p-5">
        <form action="{{ route('prediction') }}" method="POST" enctype="multipart/form-data" class="form p-5">
            @csrf
            <div class="form-group pb-5">
                <label for="image" class="fs-4 pb-2">
                    <h4>Choisir une image</h4>
                </label>
                <input type="file" class="form-control form-control-file" name="image" id="image" required>
            </div>
            <button type="submit" class="btn btn-success">Soumettre</button>
        </form>

    </div>

    @if (isset($image))


        <h2>Image soumise :</h2>
        <img src="{{ asset($image) }}" alt="Image soumise">

    @endif

    @if (isset($prediction))
        <p>Resultat: {{ $prediction['classe'] }} </p>
        <p>Confiance: {{ $prediction['confiance'] }} </p>
    @endif

{{--
    <div class="carte-login">
        <div class="border w-10 rounded bg-white">
            <div class="container py-4">
                <form method="POST" action="">
                    @csrf
                        <button type="submit" class="btn btn-danger text-white float-right">se connecter</button>
                </form>
            </div>
        </div>
    </div>  --}}



@endsection
