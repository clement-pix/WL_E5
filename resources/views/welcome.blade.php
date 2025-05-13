@extends('layout')

@section('content')
    <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Bienvenue sur la page d'accueil de WatchList</h2>

    @if($medias->isEmpty())
        <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Liste de nos films et séries</h2>
        <p class="text-center">Aucun média disponible.</p>
    @else
        <!-- Swiper Container -->
        <div class="swiper mySwiper" style="padding: 30px 0;">
            <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Liste de nos films et séries</h2>
            <div class="swiper-wrapper">
                @foreach($medias as $media)
                    <div class="swiper-slide" style="display: flex; flex-direction: column; align-items: center;">
                        <a href="{{ route('media.show', $media->id_media) }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset($media->lien_image) }}"
                                 alt="{{ $media->titre }}"
                                 style="height: 220px; width: 100%; max-width: 160px; object-fit: cover; border-radius: 10px;">
                            <p style="margin-top: 10px; font-size: 16px; font-weight: bold; text-align: center; max-width: 160px;">
                                {{ $media->titre }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySwiper', {
            loop: true,
            slidesPerView: 5,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1024: { slidesPerView: 5 },
                768: { slidesPerView: 3 },
                640: { slidesPerView: 2 },
                0: { slidesPerView: 1 }
            }
        });
    });
</script>
@endsection
