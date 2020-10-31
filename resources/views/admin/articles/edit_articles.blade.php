@extends('admin.base.main')
@section('content')
    <h2 class="mdc-button__label">Chỉnh Sửa Bài Viết</h2>
    <form action="{{route('articles.update',$updateArticles->article_id)}}" method="POST" name='edit_articles' enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                            <input class="mdc-text-field__input" name="article_edit_name" value="{{$updateArticles->article_name}}" id="article_name" type="text" placeholder="Nhập vào tiêu đề bài viết" aria-label="Label">
                        </label><br>

                        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mb-1percent">
                            <span class="mdc-text-field__ripple"><i
                                    class="material-icons mdc-list-item__graphic icon_input"
                                    aria-hidden="true"
                                >image</i></span>
                            <input class="mdc-text-field__input" name="article_edit_image" value="{{$updateArticles->article_image}}" id="article_image" type="text"  placeholder="Url ảnh" aria-label="Label">
                        </label><br>
                        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-1percent">
                            <span class="mdc-text-field__ripple"><i
                                    class="material-icons mdc-list-item__graphic icon_input"
                                    aria-hidden="true"
                                >description</i></span>
                            <input class="mdc-text-field__input" name="article_edit_short_des" value="{{$updateArticles->article_short_des}}" id="article_short_des" type="text" placeholder="Mô tả ngắn về bài viết" aria-label="Label">
                        </label><br>
                    </div>
                    <div class="mb-5percent">
                        <textarea name="article_edit_content" rows="25" id="article_edit_content">{{$updateArticles->article_content}}</textarea>
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
                        <input class="mdc-text-field__input" name="seo_edit_keywords" value="{{$updateArticles->seo_keywords}}" id="seo_keywords" type="text" placeholder=" SEO keywords của bài viết" aria-label="Label">
                    </label><br>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-1percent">
                        <span class="mdc-text-field__ripple"><i
                                class="material-icons mdc-list-item__graphic icon_input"
                                aria-hidden="true"
                            >description</i></span>
                        <input class="mdc-text-field__input" name="seo_edit_des" value="{{$updateArticles->seo_des}}" id="seo_des" type="text" placeholder=" SEO mô tả về bài viết" aria-label="Label">
                    </label><br>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-5percent">
                        <span class="mdc-text-field__ripple"><i
                                class="material-icons mdc-list-item__graphic icon_input"
                                aria-hidden="true"
                            >image</i></span>
                        <input class="mdc-text-field__input" name="seo_edit_img" value="{{$updateArticles->seo_img}}" id="seo_img" type="text" placeholder=" Nhập vào SEO URL ảnh" aria-label="Label">
                    </label><br>
                </div>
            </div>
        </div>
        <div class="mt-2percent ml-3percent mb-1percent D-flex">
        <button
                type="submit"
                @click="menuItemClicked('Statistics')"
                class="mdc-list-item btn-w-main mdc-button mdc-button--raised border-none" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i
                    class="material-icons mdc-list-item__graphic "
                    aria-hidden="true"
                >add</i>
                <span class="mdc-list-item__text">Tải Lên</span>
            </button>
            <button
                type="reset"
                @click="menuItemClicked('Statistics')"
                class="mdc-list-item mdc-button mdc-button__label btn-w-main color_button_main border-none ml-1percent" aria-current="page">
                <span class="mdc-list-item__ripple"></span>
                <i
                    class="material-icons mdc-list-item__graphic"
                    aria-hidden="true"
                >cached</i>
                <span class="mdc-list-item__text">Làm Lại</span>
            </button>
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
    </form>
@endsection
@section('js')
    <script>
        $.validator.addMethod('regx_edit', function(value) {
            let regex_edit = /(http(s?):)([/|.|\w|\s|-])*\.(?:png|PNG|JPEG|jpeg|jpg|JPG)/g
            return value.trim().match(regex_edit);
        });
        $("form[name='edit_articles']").validate({
            rules: {
                article_edit_name:{
                    required: true,
                    maxlength: 60,
                },
                article_edit_image:{
                    required: true,
                    maxlength: 255,
                    regx_edit: true,
                },
                article_edit_short_des:{
                    maxlength: 255,
                },
                seo_edit_keywords:{
                    maxlength: 60,
                },
                seo_edit_des: {
                    maxlength: 60,
                },
                seo_edit_img: {
                    maxlength: 255,
                    regx_edit: true,
                },
            },
            messages: {
                article_edit_name: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 60 kí tự",
                },
                article_edit_image: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 255 kí tự",
                    regx_edit:"* Định dạng ảnh không đúng!"
                },
                article_edit_short_des:{
                    maxlength:"* Không vượt quá 255 kí tự",
                },
                seo_edit_keywords:{
                    maxlength:"* Không vượt quá 60 kí tự",
                },
                seo_edit_des:{
                    maxlength:"* Không vượt quá 60 kí tự",
                },
                seo_edit_img: {
                    maxlength:"* Không vượt quá 255 kí tự",
                    regx_edit:"* Định dạng ảnh không đúng!",
                },
            },
            highlight: function(element) {
                $(element).parent().addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass('has-error');
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    </script>
@endsection
