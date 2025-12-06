<div class="ad-item-wrap mb8">
    @foreach(wncms()->link()->getList(['tags' => isset($tag) ? [$tag] : null]) as $link)
    <a class="by-item" wncms-link-click data-click-id="{{ $link->id }}" data-click-type="{{ wncms()->getModelClass('link') }}" href="{{ $link->url }}" target="_blank">
        <div class="item-s4">
            <div class="header mb8">
                <div class="cover">
                    <img src="{{ $link->image }}" alt="">
                </div>
                <div class="flex-1 ml12">
                    <div class="name">{{ $link->name }}</div>
                    <div class="flex flex-middle mt-10 f20 address">
                        <img class="address-icon" src="{{ wncms()->theme()->asset($themeId, 'images/address-icon.svg') }}" alt="">
                        <span class="address-text">{{ $link->slogan }}</span>
                    </div>
                </div>
                <div class="btn-detail">@lang("$themeId::word.view_resource_info")</div>
            </div>

            <div class="fc-gray">
                <div class="fc-text">
                    @php
                        $desc = qixing_parse_description($link->description);
                    @endphp

                    {{-- shorts --}}
                    <div class="fc-item">
                        @foreach(collect($desc['shorts'])->chunk(3) as $group)
                        <div class="fc-flex">
                            @foreach($group as $info)
                            @php
                                [$label, $value] = array_pad(explode(':', $info, 2), 2, '');
                            @endphp
                            <div>
                                <span class="fc-title">{{ $label }}</span>
                                <span>{{ $value }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    {{-- longs --}}
                    @foreach($desc['longs'] as $info)
                        @php
                            [$label, $value] = array_pad(explode(':', $info, 2), 2, '');
                        @endphp
                        <div class="fc-item no-wrap">
                            <span class="fc-title">{{ $label }}</span>
                            <span>{{ $value }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="more-preview">
                    @foreach($link->getMedia('link_content') as $image)
                    <img src="{{ $image->getUrl() }}">
                    @endforeach
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
