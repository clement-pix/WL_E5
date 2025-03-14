@extends('layout')

@section('content')
    <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Bienvenue sur la page d'accueil de WatchList</h2>
    <br>

    @if($medias->isEmpty())
    <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Liste de nos films et séries</h2>
        <p>Aucun média disponible.</p>
    @else
        <!-- Conteneur principal du carrousel Swiper -->
        <div class="swiper-container" style="width: 90%; margin: 0 auto;">
            <!-- Wrapper des slides -->
            <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Liste de nos films et séries</h2>
            <div class="swiper-wrapper">
                @foreach($medias as $media)
                    <!-- Chaque slide -->
                    <div class="swiper-slide" style="display: flex; flex-direction: column; align-items: center; width: 160px;">
                    <!-- Le lien englobe l'image ET le titre -->
                    <a href="{{ route('media.show', $media->id_media) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset($media->lien_image) }}" alt="{{ $media->titre }}" style="height: 200px; width: 160px; object-fit: cover; border-radius: 10px;">
                    <p style="margin-top: 10px; font-size: 16px; font-weight: bold; text-align: center; max-width: 160px"> {{ $media->titre }} </p>
                    </a>
                    </div>
                @endforeach
            </div>

            <!-- Flèches de navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif
@endsection

@section('scripts')
    <!-- Si Swiper JS est déjà inclus dans votre layout, vous pouvez retirer cette inclusion ici -->
    <script>
        // Initialisation de Swiper
        var swiper = new Swiper('.swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 5,
        spaceBetween: 5, // On réduit à 5px
        breakpoints: {
            1024: { slidesPerView: 5, spaceBetween: 5 },
            768: { slidesPerView: 2, spaceBetween: 5 },
            640: { slidesPerView: 1, spaceBetween: 5 },
            0: { slidesPerView: 1, spaceBetween: 5 }
        }
        });

    </script>
@endsection
