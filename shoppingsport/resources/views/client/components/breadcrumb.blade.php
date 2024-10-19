<div class="breadcrumb w-100">
    <div class="container">
        <ul itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach ($items as $key => $item)
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    @if (isset($item['link']))
                        <a itemprop="item" href="{{ $item['link'] }}" style="display: inline;">
                            <span itemprop="name">{{ $item['name'] }}</span>
                            <meta itemprop="position" content="{{ $key + 1 }}">
                        </a>
                    @else
                        <span itemprop="name">{{ $item['name'] }}</span>
                        <meta itemprop="position" content="{{ $key + 1 }}">
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
