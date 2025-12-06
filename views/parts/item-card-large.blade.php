<div class="ad-item-wrap s-wrap">
    @foreach(wncms()->link()->getList([
        'tags' => isset($tag) ? [$tag] : null
    ]) as $link)
    <a wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank" class="lf-g">
        <img class="lf-g-img" src="{{ $link->image }}" alt="">
        <div class="lf-g-d">
            <div class="mb-4 ad-name">{{ $link->name }}</div>
            <div class="lf-g-load"></div>
        </div>
        <img class="go-icon" src="{{ wncms()->theme()->asset($themeId, 'images/right-icon.svg') }}" alt="">
    </a>
    @endforeach
</div>
