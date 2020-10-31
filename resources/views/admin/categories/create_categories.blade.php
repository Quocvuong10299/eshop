@extends('admin.base.main')
@section('content')
    <div class="mdc-data-table w-100 p20">
        @if(Session::has(('create_failed')))
            <div class="alert D-flex bg-color-fail">
                <i class="material-icons alert-fail">privacy_tip</i>
                <p class="alert-fail">{!! Session::get('create_failed') !!}</p>
            </div>
        @endif
        <h2 class="mdc-button__label">Thêm Danh Mục</h2>

        <form action="{{route('categories.create')}}" method="POST" name='add_categories' enctype="multipart/form-data">
            @csrf
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mt-2percent">
                <span class="mdc-text-field__ripple"><i
                        class="material-icons mdc-list-item__graphic icon_input"
                        aria-hidden="true"
                    >add</i></span>
                <input class="mdc-text-field__input" name="cate_name" id="cate_name" type="text" placeholder="Nhập vào tên danh mục" aria-label="Label">
            </label><br>

            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label w-100 mb-20 mb-1percent">
                <span class="mdc-text-field__ripple"><i
                        class="material-icons mdc-list-item__graphic icon_input"
                        aria-hidden="true"
                    >image</i></span>
                <input class="mdc-text-field__input" name="cate_image" id="cate_image" type="text"  placeholder="Url ảnh" aria-label="Label" required>
            </label><br>
            <br>
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
                        <li class="mdc-list-item mdc-list-item--selected mdc-list-item--disabled" data-value="">
                            <span class="mdc-list-item__ripple"></span>
                            <span class="mdc-list-item__text"></span>
                        </li>
                        @foreach($parent as $parentItem)
                            <li class="mdc-list-item" data-value="{{$parentItem->cate_id}}" role="option">
                                <input type="hidden" name="parent_select" id="parent_select" value="">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text text_center">{{$parentItem->cate_name}}</span>
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
                        <li class="mdc-list-item mdc-list-item--selected mdc-list-item--disabled" data-value="">
                            <span class="mdc-list-item__ripple"></span>
                            <span class="mdc-list-item__text"></span>
                        </li>
                        @foreach($cateItem as $purposeItem)
                            <li class="mdc-list-item" data-value="{{$purposeItem->cate_id}}" role="option">
                                <input type="hidden" name="parent_select_purpose" id="parent_select_purpose" value="">
                                <span class="mdc-list-item__ripple"></span>
                                <span class="mdc-list-item__text text_center">{{$purposeItem->cate_purpose}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mb-1percent D-flex">
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
                    @click="menuItemClicked('Statistics')" href="{{route('categories')}}"
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
    </div>
@endsection
{{--<script src="/js/jquery.validate.min.js"></script>--}}
@section('js')
    <script>
        $.validator.addMethod('regx', function(value) {
            let regex = /(http(s?):)([/|.|\w|\s|-])*\.(?:png|PNG|JPEG|jpeg|jpg|JPG)/g
            return value.trim().match(regex);
        });
        $("form[name='add_categories']").validate({
            rules: {
                cate_name: {
                    required: true,
                    maxlength: 60,
                },
                cate_image: {
                    required: true,
                    maxlength: 255,
                    regx: true
                },
            },
            messages: {
                cate_name: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 60 kí tự",
                },
                cate_image: {
                    required: "* Không được để trống!",
                    maxlength:"* Không vượt quá 255 kí tự",
                    regx: "Định dạng ảnh không đúng!",
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
        const selectElement = document.querySelector('.mdc-select');
        const select = new mdc.select.MDCSelect(selectElement);
        const selectPurpose = document.querySelector('.select-purpose');
        const selectPur = new mdc.select.MDCSelect(selectPurpose);

        select.listen('MDCSelect:change', () => {
            document.getElementById('parent_select').value = select.value;
        });

        select.listen('MDCSelect:change', () => {
            document.getElementById('parent_select_purpose').value = selectPur.value;
        });
    </script>
@endsection
