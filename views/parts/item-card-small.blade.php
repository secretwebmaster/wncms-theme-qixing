<div class="ad-item-wrap" style="background-image: url({{ wncms()->theme()->asset($themeId, 'images/ff-title.jpg') }});">
    <div class="ad-item-conter grid-cols-2">
        @foreach(wncms()->link()->getList([
            'tags' => isset($tag) ? [$tag] : null
        ]) as $link)
        <a wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank" class="ad2-item">
            <img class="ad2-item-img" src="{{ $link->image }}" alt="">
            <div class="ad2-item-info">
                <div class="mb-4 ad2-name">{{ $link->name }}<img class="ad2-icon" src="{{ wncms()->theme()->asset($themeId, 'images/hot-icon1.svg') }}" alt=""></div>
                <div class="ad2-sub-text">{{ $link->description }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
