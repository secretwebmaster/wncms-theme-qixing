<div class="ad-item-wrap" style="background-image: url('{{ wncms()->theme()->asset($themeId, 'images/jp-title.jpg') }}');">
    <div class="ad-item-conter grid-cols-5">
        @foreach (wncms()->link()->getList([
            'tags' => isset($tag) ? $tag : null,
        ]) as $link)
            <a wncms-link-click data-link-id="{{ $link->id }}" class="grid-item" target="_blank" href="{{ $link->url }}">
                <img class="mb-4 lazyload" src="{{ gto('thumbnail_placeholder', $website->site_favicon) }}" data-src="{{ $link->image }}" alt="">
                <div class="mb-4 text">{{ $link->name }}</div>
                <div class="jgg-load">{{ gto('item_app_button_text', __('wncms::word.download')) }}</div>
            </a>
        @endforeach
    </div>
</div>
