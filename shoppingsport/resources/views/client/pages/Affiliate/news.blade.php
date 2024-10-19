@extends('client.layouts.master')

@section('content')
    @include('client.components.breadcrumb', [
        'title' => 'Tin tức',
        'items' => $breadcrumbItems,
    ])
    <div class=" post_single  w-100">
        <div class="container">
            <div class="post_single__top w-100 flex">
                <div class="post_single__detail">
                    <div class="post_single__name w-100">
                        <h1 class="color_title">Tin tức</h1>
                    </div>
                    @if (is_null($newsItem))
                        <div class="content" style="">
                            <div id="listdata">
                                <div class="home-middle">
                                    <div class="home-middle__left">
                                        @foreach ($news as $item)
                                            <div class="post_standing flex">
                                                <div class="post_standing__content">
                                                    <div class="post_standing__date flex mb-20">
                                                        <a href="{{ route('user.list-news') }}" aria-label="Tin tức"
                                                            class="text-up fs-14 category date_item mr-20 fw-600">Tin
                                                            tức</a>
                                                        <span
                                                            class="date text-up fs-14 date_item color_desc mr-20">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                                    </div>
                                                    <div class="post_standing__name mb-20">
                                                        <a href="{{ route('user.list-news', $item->slug) }}"
                                                            aria-label="Tất thể thao là gì? Nên mua tất chơi thể thao như nào? Ở đâu?">
                                                            <h3 class="title_box color_head fs-25">{{ $item->title }}</h3>
                                                        </a>
                                                    </div>
                                                    <div class="post_standing__desc">
                                                        <p class="fs-14 color_desc lh-22">
                                                            <?php
                                                            $content = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/', '', $item->content);
                                                            echo \Str::words(strip_tags($content), 50);
                                                            ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="post_standing__img">
                                                    <a href="{{ route('user.introduce', $item->slug) }}"
                                                        aria-label="Tất thể thao là gì? Nên mua tất chơi thể thao như nào? Ở đâu?">
                                                        <img loading="lazy" src="{{ showImageStorage($item->logo) }}"
                                                            alt="Tất thể thao là gì? Nên mua tất chơi thể thao như nào? Ở đâu?"
                                                            width="350px" height="250px">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{ $news->links('vendor.custom') }}
                        </div>
                    @else
                   {!! $newsItem->content !!}
                    @endif
                </div>
                @include('client/pages/include/sidebar')
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .post_single__detail {
            border-right: 1px solid var(--color_border);
            padding-right: 20px;
            width: 75%;
        }

        .post_single__name {
            margin-bottom: 20px;
        }

        .post_single__name h1 {
            font-size: 50px;
        }

        .post_single__sitebar {
            padding-bottom: 30px;
            padding-left: 20px;
            width: 25%;
        }

        @media (max-width: 768px) {
            .post_single__detail {
                border-right: none;
                padding-right: 0;
                width: 100%;
            }

            .post_single__sitebar {
                width: 100%;
            }
        }
    </style>
@endpush
