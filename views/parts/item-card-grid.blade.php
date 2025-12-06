<div class="zp-menu-wrap">
    @if($tag->children->count() >= 2)
        @foreach($tag->children as $childTag)
            @if($loop->iteration == 1)
                <div class="zp-menu-item active">
                    <img class="menu-img1 hidden" src="{{ wncms()->theme()->asset($themeId, 'images/kj-g.jpg') }}" alt="">
                    <img class="menu-img2" src="{{ wncms()->theme()->asset($themeId, 'images/kj-g-active.jpg') }}" alt="">
                </div>
            @elseif($loop->iteration == 2)
                <div class="zp-menu-item">
                    <img class="menu-img1" src="{{ wncms()->theme()->asset($themeId, 'images/tc-g.jpg') }}" alt="">
                    <img class="menu-img2 hidden" src="{{ wncms()->theme()->asset($themeId, 'images/tc-g-active.jpg') }}" alt="">
                </div>
            @endif
        @endforeach
    @endif
</div>

<div class="zp-swper">
    <div class="swiper-wrapper">

        @if($tag->children->count() >= 2)
            @foreach($tag->children as $childTag)
            <div class="swiper-slide">

                {{-- FIRST MENU --}}
                @if($loop->iteration == 1)
                <div class="zp-s-wrap">
                    @foreach(wncms()->link()->getList([
                        'tags' => [$childTag]
                    ]) as $link)
                    <a class="zone-item ad3-item" wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank">
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

                            @if($link->slogan)
                            <p>
                                <span class="zone1-item-color1">@lang("$themeId::word.price")</span>
                                <span class="zone1-item-color2">{{ $link->slogan }}</span>
                            </p>
                            @endif
                        </div>

                        <div class="zone-item-btn-wrap">
                            <div class="zone-item-btn">
                                <img src="{{ wncms()->theme()->asset($themeId, 'images/btn-icon.svg') }}" alt="">
                                <span>@lang("$themeId::word.start_now")</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                {{-- SECOND MENU --}}
                @elseif($loop->iteration == 2)
                <div class="waterfall-flow">
                    @foreach(wncms()->link()->getList([
                        'tags' => [$childTag]
                    ]) as $link)
                    <a class="flow-item" wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank">
                        <div class="flow-img-wrap">
                            <img class="flow-img" src="{{ $link->image }}" alt="">
                            <div class="flow-ab">
                                <div class="sound">
                                    <img src="{{ wncms()->theme()->asset($themeId, 'images/play-icon.svg') }}" alt="">
                                    <img src="{{ wncms()->theme()->asset($themeId, 'images/xian-icon.svg') }}" alt="">
                                    <span>{{ rand(18,25) }}''</span>
                                </div>
                                <div class="praise">
                                    <img src="{{ wncms()->theme()->asset($themeId, 'images/zan1-icon.svg') }}" alt="">
                                    <span>{{ rand(500, 4000) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flow-text-wrap">
                            <div class="flow-text1">
                                <div class="flow-name">{{ $link->name }}</div>
                                <div class="flow-add"><img src="{{ wncms()->theme()->asset($themeId, 'images/address-icon1.svg') }}" alt="">@lang("$themeId::word.nearby"){{ rand(1,30) }}KM</div>
                            </div>

                            <div class="flow-tips">
                                @foreach($link->tags->where('type', 'link_tag')->take(3) as $tag)
                                    <div class="flow-tag">{{ $tag->name }}</div>
                                @endforeach
                            </div>

                            <div class="flow-text2">{{ $link->description }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif

            </div>
            @endforeach

        @else
            <div class="swiper-slide">
                <div class="zp-s-wrap">
                    @foreach(wncms()->link()->getList([
                        'tags' => [$tag]
                    ]) as $link)
                    <a class="zone-item ad3-item" wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank">
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

                            @if($link->slogan)
                            <p>
                                <span class="zone1-item-color1">@lang("$themeId::word.price")</span>
                                <span class="zone1-item-color2">{{ $link->slogan }}</span>
                            </p>
                            @endif
                        </div>

                        <div class="zone-item-btn-wrap">
                            <div class="zone-item-btn">
                                <img src="{{ wncms()->theme()->asset($themeId, 'images/btn-icon.svg') }}" alt="">
                                <span>@lang("$themeId::word.start_now")</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
