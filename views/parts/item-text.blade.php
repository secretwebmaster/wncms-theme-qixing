<div class="ad-text-wrap">
    @foreach(wncms()->link()->getList([
        'tags' => isset($tag) ? [$tag] : null
    ]) as $link)
    <a wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" class="ad-text-item h" rel="external nofollow" href="{{ $link->url }}" target="_blank">
        <img class="ad-text-icon" src="{{ wncms()->theme()->asset($themeId, 'images/text-h-icon.svg') }}" alt="">
        <span>{{ $link->name }}</span>
    </a>
    @endforeach
</div>
