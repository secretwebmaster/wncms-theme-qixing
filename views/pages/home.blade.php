@extends("$themeId::layouts.app")

@push('head_seo')
    @include('wncms::frontend.common.seo.head-seo', [
        'seoContentType' => 'article',
        'seoTitle' => $website->site_name,
        'seoDescription' => $website->site_seo_description,
        'seoKeyword' => $website->site_seo_keywords,
        'seoImage' => $website->site_logo,
    ])
@endpush

@section('content')

    <div class="body-container">
        <div class="swiper-c">
            <div class="swiper-wrapper">

                {{-- home --}}
                <div class="swiper-slide">
                    @if (gto('home_link_category'))
                        @include("$themeId::parts.item-app", ['tag' => gto('home_link_category')])
                    @endif
                </div>

                {{-- category --}}
                @php
                    $itemCardGrid = explode(',', gto('link_style_item_card_grid'));
                    $itemGirlList = explode(',', gto('link_style_item_girl_list'));
                    $itemProductGrid = explode(',', gto('link_style_item_product_grid'));
                @endphp

                @if (gto('header_link_category'))
                    @foreach (wncms()->tag()->getList([
                        'tag_type' => 'link_category',
                        'tag_ids' => gto('header_link_category'),
                    ]) as $headerTag)
                        <div class="swiper-slide">
                            @if (in_array($headerTag->id, $itemCardGrid))
                                @include("$themeId::parts.item-card-grid", ['tag' => $headerTag])
                            @elseif(in_array($headerTag->id, $itemGirlList))
                                @include("$themeId::parts.item-girl-list", ['tag' => $headerTag])
                            @elseif(in_array($headerTag->id, $itemProductGrid))
                                @include("$themeId::parts.item-product-grid", ['tag' => $headerTag])
                            @else
                                @include("$themeId::parts.item-app", ['tag' => $headerTag])
                            @endif
                        </div>
                    @endforeach
                @endif

            </div>

            <div>
                @if (gto('link_style_item_card_small'))
                    @include("$themeId::parts.item-card-small", ['tag' => gto('link_style_item_card_small')])
                @endif
                @if (gto('link_style_item_text'))
                    @include("$themeId::parts.item-text", ['tag' => gto('link_style_item_text')])
                @endif
                @if (gto('link_style_item_card_small'))
                    @include("$themeId::parts.item-card-large", ['tag' => gto('link_style_item_card_large')])
                @endif
                @if (gto('link_style_item_card_carousel'))
                    @include("$themeId::parts.item-card-carousel", ['tag' => gto('link_style_item_card_carousel')])
                @endif
                @if (gto('link_style_item_product_carousel'))
                    @include("$themeId::parts.item-product-carousel", ['tag' => gto('link_style_item_product_carousel')])
                @endif
            </div>
        </div>
    </div>

@endsection
