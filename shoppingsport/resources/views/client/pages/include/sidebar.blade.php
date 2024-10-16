<div class="post_single__sitebar">
    <div class="sidebar">
        <aside class="widget widget-text">
            <div class="widget-content">
                <div class="right_subcribe">
                    <p class="color_title mb-15">{{ $config->name }}</p>
                    <span class="fs-14"> {{ $config->description }} </span>
                    <div class="right_subcribe__connect flex">Hotline: {{ $config->constant_hotline }}</div>
                    <div class="right_subcribe__connect flex">{{ $config->address }}</div>
                </div>
            </div>
        </aside>
        <aside class="widget widget-blog">
            <p class="widget-title">Bài viết mới nhất</p>
            <div class="widget-content">

                @foreach ($news as $item)
                    <div class="widget-blog__item flex-left">
                        <div class="thumnail">
                            <a href="{{ route('user.introduce', $item->slug) }}"
                                aria-label="Ghế tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?">
                                <img loading="lazy" src="{{ showImageStorage($item->logo) }}" alt="ghe-tap-bung-03"
                                    title="{{ $item->title }}" width=80 height=80>
                            </a>
                        </div>
                        <div class="content">
                            <p class="content-title"><a class="title_box color_head" aria-label="{{ $item->title }}"
                                    href="{{ route('user.introduce', $item->slug) }}">{{ $item->title }}</a></p>
                            <p class="content-date"> <span
                                    class="fs-14 color_desc text-up date">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
</div>
