@extends('frontend.layouts.app')

@section('content')
    <section id="content">
        <div class="container px-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Archive </li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-8">
                    <h2>{{ $page_title }}</h2>
                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
                        @foreach ($post_archive as $postArchive)
                            <div class="col-lg-6">
                                <div class="card border-0 bg-light rounded-4">
                                    @if ($postArchive->featured_image && Storage::exists('public/images/posts/' . $postArchive->featured_image))
                                        <img src="{{ Storage::url('images/posts/' . $postArchive->featured_image) }}"
                                            class="card-img-top">
                                    @else
                                        <img src="{{ asset('storage/images/no-image.jpg') }}" class="card-img-top">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('posts.show', ['slug' => $postArchive->slug]) }}"
                                                class="text-decoration-none">
                                                {{ Str::limit($postArchive->title, 60) }}
                                            </a>
                                        </h5>
                                        <p class="card-text mt-3">{{ Str::limit($postArchive->description, 150) }}</p>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <i class="fa fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($postArchive->created_at)->format('d F Y, H:i:s') }}
                                            </div>
                                            <div class="col-lg-4 text-end">
                                                <a href="{{ route('posts.show', ['slug' => $postArchive->slug]) }}"
                                                    class="btn btn-sm btn-primary">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $post_archive->links() }}
                </div>

                <div class="col-lg-4">
                    @include('frontend.layouts.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
