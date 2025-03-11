@extends('layout')

@section('content')
    <br>
    <h2>Bienvenue sur la page d'accueil de WatchList</h2>
    <br>

    @if($medias->isEmpty())
        <p>Aucun média disponible.</p>
    @else
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($medias as $media)
                    <div class="swiper-slide">
                        <div style="text-align: center;">
                        <img src="{{ asset($media->lien_image) }}" alt="{{ $media->titre }}" style="max-width: 100%; border-radius: 10px;">
                            <p style="margin-top: 10px; font-size: 16px; font-weight: bold;">{{ $media->titre }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif

@endsection


@section('scripts')
    <!-- Inclure Swiper.js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
