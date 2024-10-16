@extends('client.layouts.master')

@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="https://thanhloisport.com" style="display: inline;">
                        <span itemprop="name">
                            Trang chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        Giới thiệu
                    </span>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>
    <div class=" post_single  w-100">
        <div class="container">
            <div class="post_single__top w-100 flex">
                <div class="post_single__detail">
                    <div class="post_single__name w-100">
                        <h1 class="color_title">Giới thiệu</h1>
                    </div>
                    <div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr">
                        <div class="ck-content" id="single-content" data-title="Mục lục">
                            <h2 style="text-align: left;">{{ $newDetail->title }}</h2>
                            {!! $newDetail->content !!}
                        </div>
                    </div>
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
