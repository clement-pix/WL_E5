@extends('layout')

@section('content')

<!-- Styles spécifiques au carrousel Swiper -->
<style>
    .swiper {
        width: 100%;
        padding: 30px 0;
    }

    .swiper-slide {
        background: #f9f9f9;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .swiper-slide img {
        max-width: 250px;
        width: 100%;
        height: auto;
        border-radius: 6px;
        margin-bottom: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-button-prev,
    .swiper-button-next {
        color: #333;
    }

    .media-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .swiper-slide a {
        text-decoration: none;
        color: inherit;
    }
</style>

<div class="container my-4">
    <h2 class="mb-4 text-center">Ma liste privée de médias</h2>

    {{-- Détermination de la route de retour en fonction du rôle utilisateur --}}
    @php
        $route = match(auth()->user()->id_role) {
            1 => route('dashboard.superadmin'),
            2 => route('dashboard.membre'),
            3 => route('dashboard.membreadmin'),
            default => url('/')
        };
    @endphp

    <!-- Bouton retour vers le tableau de bord -->
    <a href="{{ $route }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
        &larr; Retour
    </a>

    {{-- Si la liste est vide --}}
    @if($liste->isEmpty())
        <p class="text-muted text-center">Votre liste est vide. Ajoutez des médias ci-dessous.</p>
    @else
        <!-- Carrousel Swiper contenant les médias -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($liste as $item)
                    <div class="swiper-slide">
                        <a href="{{ url('/media/' . $item->media->id_media) }}">
                            <img src="{{ asset($item->media->lien_image) }}" alt="{{ $item->media->titre }}">
                            <div class="media-title">{{ $item->media->titre }}</div>
                        </a>

                        <!-- Formulaire pour retirer un média de la liste -->
                        <form method="POST" action="{{ route('liste-privee.destroy', $item->id_media) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mt-1">Retirer</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Boutons de navigation Swiper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif

    <hr class="my-5">

    <!-- Formulaire pour ajouter un média à la liste -->
    <h3 class="mb-3">Ajouter un média à ma liste</h3>
    <form method="POST" action="{{ route('liste-privee.store') }}" class="row g-3 align-items-end">
        @csrf
        <div class="col-md-6">
            <label for="id_media" class="form-label">Sélectionnez un média :</label>
            <select name="id_media" id="id_media" class="form-select" required>
                @foreach(App\Models\Media::all() as $media)
                    <option value="{{ $media->id_media }}">{{ $media->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                Ajouter à ma liste
            </button>
        </div>
    </form>
</div>

<!-- Initialisation du carrousel Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySwiper', {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 },
            },
        });
    });
</script>
@endsection