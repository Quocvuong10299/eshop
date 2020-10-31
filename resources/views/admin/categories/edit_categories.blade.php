@extends('admin.base.main')
@section('content')
    <div class="mdc-data-table w-100 p20">
        @if(Session::has(('create_failed')))
            <div class="alert D-flex bg-color-fail">
                <i class="material-icons alert-fail">privacy_tip</i>
                <p class="alert-fail">{!! Session::get('create_failed') !!}</p>
            </div>
        @endif

        <h2 class="mdc-button__label">Sửa Danh Mục <strong>{{$cateItem->cate_name}}</strong></h2>
        <form action="{{route('categories.update',$cateItem->cate_id)}}" name='edit_categories' method="POST">
            @csrf
            @method('PUT')
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-2percent">
               <span class="mdc-text-field__ripple"><i
                       class="material-icons mdc-list-item__graphic icon_input"
                       aria-hidden="true"
                   >edit</i></span>
                <input class="mdc-text-field__input" name="cate_edit_name" type="text" value="{{ $cateItem->cate_name }}" aria-label="Label">
            </label><br>
            <div class="mdc-select mb-20">
                <div class="mdc-select__anchor"
                     role="button"
                     aria-haspopup="listbox"
                     aria-labelledby="demo-label demo-selected-text">
                    <span class="mdc-select__ripple"></span>
                    <span id="demo-selected-text" class="mdc-select__selected-text">Vegetables</span>
                    <span class="mdc-select__dropdown-icon">
                      <svg
                          class="mdc-select__dropdown-icon-graphic"
                          viewBox="7 10 10 5">
                        <polygon
                            class="mdc-select__dropdown-icon-inactive"
                            stroke="none"
                            fill-rule="evenodd"
                            points="7 10 12 15 17 10">
                        </polygon>
                        <polygon
                            class="mdc-select__dropdown-icon-active"
                            stroke="none"
                            fill-rule="evenodd"
                            points="7 15 12 10 17 15">
                        </polygon>
                      </svg>
                    </span>
                    <span class="mdc-line-ripple"></span>
                    <span id="demo-label" class="mdc-floating-label mdc-floating-label--float-above">Danh mục cha</span>
                </div>

                <div class="mdc-select__menu mdc-menu mdc-menu-surface min-w-select" role="listbox">
                    <ul class="mdc-list">
                        <li class="mdc-list-item mdc-list-item--disabled" data-value="grains" role="option">
                            <input type="hidden" name="parent_edit_select" id="parent_edit_select" value="{{ $cateItem->parent }}">
                            <span class="mdc-list-item__ripple"></span>
                            <span class="mdc-list-item__text text_center">{{$cateItem->cate_name}}</span>
                        </li>
                        @foreach($parent as $cate_parent_edit)
                            <li class="mdc-list-item" data-value="{{$cate_parent_edit->cate_id}}" role="option">
                                <input type="hidden" id="parent_edit_select" value="">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text text_center">{{$cate_parent_edit->cate_name}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <div class="mdc-select mb-20 select-purpose">
                <div class="mdc-select__anchor"
                     role="button"
                     aria-haspopup="listbox"
                     aria-labelledby="demo-label demo-selected-text">
                    <span class="mdc-select__ripple"></span>
                    <span id="demo-selected-text" class="mdc-select__selected-text">Vegetables</span>
                    <span class="mdc-select__dropdown-icon">
                      <svg
                          class="mdc-select__dropdown-icon-graphic"
                          viewBox="7 10 10 5">
                        <polygon
                            class="mdc-select__dropdown-icon-inactive"
                            stroke="none"
                            fill-rule="evenodd"
                            points="7 10 12 15 17 10">
                        </polygon>
                        <polygon
                            class="mdc-select__dropdown-icon-active"
                            stroke="none"
                            fill-rule="evenodd"
                            points="7 15 12 10 17 15">
                        </polygon>
                      </svg>
                    </span>
                    <span class="mdc-line-ripple"></span>
                    <span id="demo-label" class="mdc-floating-label mdc-floating-label--float-above">Chủ đề</span>
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface min-w-select" role="listbox">
                    <ul class="mdc-list">
                        <li class="mdc-list-item mdc-list-item--disabled" data-value="grains" role="option">
                            <input type="hidden" name="parent_edit_select" id="parent_edit_select" value="{{ $cateItem->cate_purpose }}">
                            <span class="mdc-list-item__ripple"></span>
                            <span class="mdc-list-item__text text_center">{{$cateItem->cate_purpose}}</span>
                        </li>
                        @foreach($catePurpose as $purposeItem)
                            <li class="mdc-list-item" data-value="{{$purposeItem['cate_id']}}" role="option">
                                <input type="hidden" name="cate_edit_purpose" id="parent_select_purpose" value="{{$purposeItem['cate_purpose']}}">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text text_center">{{$purposeItem['cate_purpose']}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20">
                <span class="mdc-text-field__ripple"><i
                        class="material-icons mdc-list-item__graphic icon_input"
                        aria-hidden="true"
                    >image</i></span>
                <input class="mdc-text-field__input" name="cate_edit_image" type="text" value="{{ $cateItem->cate_image }}" aria-label="Label">
            </label>
            <br>
            <div class="">
                <img style="width: 100px; height: 100px" src="{{$cateItem->cate_image ? $cateItem->cate_image : 'https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png'}}" id="upload-image" alt="" />
            </div>
            <div class="mb-1percent D-flex mt-2percent" >
                <button
                    type="submit"
                    @click="menuItemClicked('Statistics')"
                    class="mdc-list-item btn-w-main mdc-button mdc-button--raised border-none" aria-current="page">
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic "
                        aria-hidden="true"
                    >save</i>
                    <span class="mdc-list-item__text">Cập nhật</span>
                </button>
                <a
                    @click="menuItemClicked('Statistics')" href="{{route('categories')}}"
                    class="mdc-list-item btn-w-main mdc-button mdc-button__label color_button_main border-none ml-1percent" aria-current="page">
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >keyboard_return</i>
                    <span class="mdc-list-item__text">Trở Về</span>
                </a>
            </div>
        </form>
    </div>
@endsection
{{--<script src="/js/jquery.validate.min.js"></script>--}}
@section('js')
    <script>
        $.validator.addMethod('regx_edit', function(value) {
            let regex_edit = /(http(s?):)([/|.|\w|\s|-])*\.(?:png|PNG|JPEG|jpeg|jpg|JPG)/g
            return value.trim().match(regex_edit);
        });
        $("form[name='edit_categories']").validate({
            rules: {
                cate_edit_name: {
                    required: true,
                    maxlength: 60,
                },
                cate_edit_image: {
                    required: true,
                    maxlength: 255,
                    regx_edit: true
                },
            },
            messages: {
                cate_edit_name: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 60 kí tự",
                },
                cate_edit_image: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 255 kí tự",
                    regx_edit:"* Định dạng ảnh không đúng!"
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
    <script>
        const selectElementEdit = document.querySelector('.mdc-select');
        const select_edit = new mdc.select.MDCSelect(selectElementEdit);
        const selectPurpose = document.querySelector('.select-purpose');
        const selectPur = new mdc.select.MDCSelect(selectPurpose);

        select_edit.listen('MDCSelect:change', () => {
            document.getElementById('parent_edit_select').value = select_edit.value;
        });
        select.listen('MDCSelect:change', () => {
            document.getElementById('parent_select_purpose').value = selectPur.value;
        });
    </script>
@endsection
