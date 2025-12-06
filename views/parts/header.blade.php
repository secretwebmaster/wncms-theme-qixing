<div class="my-sticky">
    @if (gto('header_marquee_text'))
        <div class="marquee-wrap">
            <div class="marquee-box">
                <img class="notif" src="{{ wncms()->theme()->asset($themeId, 'images/notification.svg') }}" alt="">
                <div class="container-main">
                    <p>{{ gto('header_marquee_text') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="nav-c">
        <div class="item active">@lang("$themeId::word.home")</div>

        @if (gto('header_link_category'))
            @foreach (wncms()->tag()->getList([
                'tag_type' => 'link_category',
                'tag_ids' => gto('header_link_category'),
            ]) as $headerTag)
                <div class="item">{{ $headerTag->name }}</div>
            @endforeach
        @endif

        @if (gto('show_favorite_button'))
            <div class="item">
                <a href="javascript:;" onclick="addFavorite()">@lang("$themeId::word.add_favorite")</a>
            </div>

            <script>
                function addFavorite() {
                    const url = window.location.href;
                    const title = document.title;

                    try {
                        window.external.addFavorite(url, title);
                    } catch (e) {
                        try {
                            window.sidebar.addPanel(title, url, '');
                        } catch (e) {
                            alert('@lang("$themeId::word.add_favorite_alert")');
                        }
                    }
                }
            </script>
        @endif
    </div>
</div>
