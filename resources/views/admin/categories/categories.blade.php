@extends('admin.base.main')
@section('content')
    @if(\Session::has(('create_success')))
        <div class="alert D-flex bg-color-success">
            <i class="material-icons alert-success">check_circle_outline</i>
            <p class="alert-success">{!! \Session::get('create_success') !!}</p>
        </div>
    @elseif(\Session::has(('delete_success')))
        <div class="alert D-flex bg-color-success">
            <i class="material-icons alert-success">check_circle_outline</i>
            <p class="alert-success">{!! \Session::get('delete_success') !!}</p>
        </div>
    @elseif(\Session::has(('update_success')))
        <div class="alert D-flex bg-color-success">
            <i class="material-icons alert-success">check_circle_outline</i>
            <p class="alert-success">{!! \Session::get('update_success') !!}</p>
        </div>
    @endif
    <div class="mb-1percent btn-add">
        <a
            @click="menuItemClicked('Statistics')"
            class="mdc-list-item mdc-button mdc-button--touch color_button_main"
            href="{{route('categories.create')}}"
            aria-current="page"
        >
            <span class="mdc-list-item__ripple"></span>
            <i
                class="material-icons mdc-list-item__graphic"
                aria-hidden="true"
            >add</i>
            <span class="mdc-list-item__text">Thêm Danh Mục</span>
        </a>
    </div>

<div class="mdc-data-table">
    <div class="mdc-data-table__table-container">
        <table class="mdc-data-table__table" aria-label="Dessert calories" style="width: 100%;">
            <thead>
                <th
                    class="mdc-data-table__header-cell"
                    role="columnheader"
                    scope="col"
                    style="text-align: left; vertical-align: middle; font-weight: bold; width: 100px;"
                >Hình ảnh</th>
                <th
                    class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric"
                    role="columnheader"
                    scope="col"
                    style="text-align: left; vertical-align: middle; font-weight: bold;"
                >Tên danh mục</th>
                <th
                    class="mdc-data-table__header-cell"
                    role="columnheader"
                    scope="col"
                    style="text-align: left; vertical-align: middle; font-weight: bold;"
                >Ngày tạo</th>
                <th
                    class="mdc-data-table__header-cell text_center"
                    role="columnheader"
                    scope="col"
                    style="text-align: left; vertical-align: middle; font-weight: bold;"
                >Thao tác</th>
            </tr>
            </thead>
            <tbody class="mdc-data-table__content">
            @foreach($cate as $categories)
            <tr class="mdc-data-table__row">
                <th class="mdc-data-table__cell" scope="row" style="position: relative;">
                    <img
                        src="{{($categories->cate_image) ? $categories->cate_image : 'https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png'}}"
                        width="35"
                        height="35"
                        style="position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%);border-radius: 50%;"
                    />
                </th>
                <td
                    class="mdc-data-table__cell mdc-data-table__cell--numeric" title="{{$categories->cate_name}}"
                    style="text-align: left; vertical-align: middle;"
                >{{$categories->cate_name}}</td>
                <td
                    class="mdc-data-table__cell"
                    style="text-align: left; vertical-align: middle;"
                >{{$categories->created_at}}</td>
                <td class="mdc-data-table__cell" style="text-align: center; vertical-align: middle;">
                    <div style="display: flex">
                    <a
                        @click="menuItemClicked('Statistics')"
                        class="mdc-list-item w-button-add ml-action-button"
                        href="{{route('categories.edit',$categories->cate_id)}}"
                        aria-current="page"
                    >
                        <span class="mdc-list-item__ripple"></span>
                            <i
                                class="material-icons"
                                aria-hidden="true"
                            > edit</i>
                    </a>
                        <a
                            {{--                           @click="menuItemClicked('Statistics')"--}}
                            class="mdc-list-item w-button-add btnShowDialog"
                            href="#"
                            data-cate-id="{{ $categories->cate_id }}"
                            aria-current="page" style="margin-left: 5%!important">
                            <span class="mdc-list-item__ripple"></span>
                            <i
                                class="material-icons"
                                aria-hidden="true"
                            > delete</i>
                        </a>
                        {{--                                show dialog component**********777--}}
                        <div class="mdc-dialog">
                            <div class="mdc-dialog__container">
                                <div class="mdc-dialog__surface"
                                     role="alertdialog"
                                     aria-modal="true"
                                     aria-labelledby="my-dialog-title"
                                     aria-describedby="my-dialog-content">
                                    <div class="mdc-dialog__content text-left" id="my-dialog-content">
                                        Bạn có chắc muốn xóa? <br>Khi bạn xác nhận xóa sẽ không thể hoàn tác!
                                    </div>
                                    <div class="mdc-dialog__actions">
                                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="cancel">
                                            <div class="mdc-button__ripple"></div>
                                            <span class="mdc-button__label">Hủy</span>
                                        </button>
                                        <form class="delCateItem" method="GET">
                                            @csrf
                                            <button type="submit" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="accept" >
                                                <div class="mdc-button__ripple"></div>
                                                <span class="mdc-button__label">Xóa</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="mdc-dialog__scrim"></div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>

    </div>
    {{ $cate->links() }}
</div>
@endsection


