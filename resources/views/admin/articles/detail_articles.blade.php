@extends('admin.base.main')
@section('content')
    <h2 class="mdc-button__label">Chỉnh Sửa Bài Viết</h2>
        <div class="D-flex mt-1percent">
            <div class="w-60 ml-3percent group-article">
                <div class="w-90 ml-5percent">
                    <span class="mdc-button article-input">
                        <div class="mdc-button__ripple"></div>
                        <i class="material-icons mdc-button__icon" aria-hidden="true"
                        >article</i
                        >
                        <span class="mdc-button__label">Thông tin bài viết</span>
                    </span>
                    <div class="mdc-button__label">
                        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-5percent">
                            <span class="mdc-text-field__ripple"><i
                                    class="material-icons mdc-list-item__graphic icon_input"
                                    aria-hidden="true"
                                >add</i></span>
                            <input class="mdc-text-field__input" name="article_edit_name" title="{{$articles->article_name}}" value="{{$articles->article_name}}" id="article_name" type="text" placeholder="Nhập vào tiêu đề bài viết" aria-label="Label" readonly>
                        </label><br>

                        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mb-1percent">
                            <span class="mdc-text-field__ripple"><i
                                    class="material-icons mdc-list-item__graphic icon_input"
                                    aria-hidden="true"
                                >image</i></span>
                            <input class="mdc-text-field__input" name="article_edit_image" title="{{$articles->article_image}}" value="{{$articles->article_image}}" id="article_image" type="text"  placeholder="Url ảnh" aria-label="Label" readonly>
                        </label><br>
                        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-1percent">
                            <span class="mdc-text-field__ripple"><i
                                    class="material-icons mdc-list-item__graphic icon_input"
                                    aria-hidden="true"
                                >description</i></span>
                            <input class="mdc-text-field__input" name="article_edit_short_des" title="{{$articles->article_short_des}}" value="{{$articles->article_short_des}}" id="article_short_des" type="text" placeholder="Mô tả ngắn về bài viết" aria-label="Label" readonly>
                        </label><br>
                    </div>
                    <div class="mb-5percent">
                        <textarea name="article_edit_content" rows="25" title="{{$articles->article_content}}" id="article_edit_content" readonly>{{$articles->article_content}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ml-3percent w-40 group-article mr-3percent">
                <div class="w-90 ml-5percent">
                    <span class="mdc-button article-input">
                        <div class="mdc-button__ripple"></div>
                        <i class="material-icons mdc-button__icon" aria-hidden="true"
                        >pageview</i
                        >
                        <span class="mdc-button__label">SEO bài viết</span>
                    </span>

                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-7percent">
                        <span class="mdc-text-field__ripple"><i
                                class="material-icons mdc-list-item__graphic icon_input"
                                aria-hidden="true"
                            >text_rotation_none</i></span>
                        <input class="mdc-text-field__input" name="seo_edit_keywords" title="{{$articles->seo_keywords}}" value="{{$articles->seo_keywords}}" id="seo_keywords" type="text" placeholder=" SEO keywords của bài viết" aria-label="Label" readonly>
                    </label><br>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-1percent">
                        <span class="mdc-text-field__ripple"><i
                                class="material-icons mdc-list-item__graphic icon_input"
                                aria-hidden="true"
                            >description</i></span>
                        <input class="mdc-text-field__input" name="seo_edit_des" title="{{$articles->seo_des}}" value="{{$articles->seo_des}}" id="seo_des" type="text" placeholder=" SEO mô tả về bài viết" aria-label="Label" readonly>
                    </label><br>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-5percent">
                        <span class="mdc-text-field__ripple"><i
                                class="material-icons mdc-list-item__graphic icon_input"
                                aria-hidden="true"
                            >image</i></span>
                        <input class="mdc-text-field__input" name="seo_edit_img" title="{{$articles->seo_img}}" value="{{$articles->seo_img}}" id="seo_img" type="text" placeholder=" Nhập vào SEO URL ảnh" aria-label="Label" readonly>
                    </label><br>
                </div>
            </div>
        </div>
        <div class="mt-2percent ml-3percent mb-1percent D-flex">
            <a
                @click="menuItemClicked('Statistics')" href="{{route('articles')}}"
                class="mdc-list-item btn-w-main mdc-button mdc-button__label color_button_main border-none  ml-1percent" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i
                    class="material-icons mdc-list-item__graphic"
                    aria-hidden="true"
                >keyboard_return</i>
                <span class="mdc-list-item__text">Trở Về</span>
            </a>
        </div>
@endsection

