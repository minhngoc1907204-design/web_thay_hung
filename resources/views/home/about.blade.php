@extends('layout/home')
@section('body')

<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>About Yarn</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about_story py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                @if($about)
                    <h2 class="mb-3">{{ $about->title }}</h2>
                    <p>{{ $about->content_1 }}</p>

                    @if($about->content_2)
                        <p>{{ $about->content_2 }}</p>
                    @endif

                    @if($about->content_3)
                        <p>{{ $about->content_3 }}</p>
                    @endif
                @else
                    <p>Chưa có nội dung About</p>
                @endif
            </div>

            <div class="col-md-6 text-center">
                @if($about && $about->image)
                    <img src="{{ $about->image }}"
                         class="img-fluid"
                         style="max-height:300px">
                @endif
            </div>

        </div>
    </div>
</section>

@endsection
