<div class="qq-wrap">
    @foreach(wncms()->link()->getList([
        'tags' => isset($tag) ? [$tag] : null
    ]) as $link)
    <a wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank" class="qq-item">
        <div class="qq-img-wrap">
            <img class="qq-img" src="{{ $link->image }}" alt="">
        </div>

        <div class="qq-title">{{ $link->name }}</div>

        <div class="qq-info">
            <div>
                <div class="qq-pic">￥{{ rand(100,1000) }}</div>
                <div class="qq-pj">
                    <img src="{{ wncms()->theme()->asset($themeId, 'images/star-icon.svg') }}" alt="">
                </div>
            </div>

            <div class="qq-pl">
                <div class="qq-ys">@lang("$themeId::word.sold"){{ rand(30000,50000) }}+</div>
                <div>{{ rand(10000,30000) }}+@lang("$themeId::word.reviews")</div>
            </div>
        </div>
    </a>
    @endforeach
</div>
