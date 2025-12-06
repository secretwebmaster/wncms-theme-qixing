<div class="ad-item-wrap" style="background-image: url({{ wncms()->theme()->asset($themeId, 'images/yp-title.jpg') }});">
    <div class="ad-item-conter">
        <div id="ad1-swiper" class="swiper-container">
            <div class="swiper-wrapper">
                @foreach(wncms()->link()->getList([
                    'tags' => isset($tag) ? [$tag] : null
                ]) as $link)
                <div class="swiper-slide">
                    <a class="zone-item ad3-item" wncms-link-click data-link-id="{{ $link->id }}" href="{{ $link->url }}" target="_blank">
                        <img class="ad3-item-img" src="{{ $link->image }}" alt="">
                        <div class="ad3-item-a">
                            <div class="like-wrap">
                                <img src="{{ wncms()->theme()->asset($themeId, 'images/iocn-like.svg') }}" alt="">
                                <span>{{ rand(800, 3000) }}@lang("$themeId::word.people_like")</span>
                            </div>
                            <div class="add-wrap">
                                <img src="{{ wncms()->theme()->asset($themeId, 'images/icon-add.svg') }}" alt="">
                                <span>{{ rand(1000, 2500) }}M</span>
                            </div>
                        </div>
                        <div class="zone-text-wrap">
                            <p class="zone1-item-name-wrap my4">
                                <span class="zone1-item-name">{{ $link->name }}</span>
                                <span class="zone1-item-color2">{{ $link->description }}</span>
                            </p>
                            <p>
                                <span class="zone1-item-color1">@lang("$themeId::word.price")</span>
                                <span class="zone1-item-color2">{{ $link->slogan }}</span>
                            </p>
                        </div>
                        <div class="zone-item-btn-wrap">
                            <div class="zone-item-btn">
                                <img src="{{ wncms()->theme()->asset($themeId, 'images/btn-icon.svg') }}" alt="">
                                <span>@lang("$themeId::word.start_now")</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
