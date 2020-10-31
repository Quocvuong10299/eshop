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
            href="{{route('articles.create')}}"
            aria-current="page"
        >
            <span class="mdc-list-item__ripple"></span>
            <i
                class="material-icons mdc-list-item__graphic"
                aria-hidden="true"
            >add</i>
            <span class="mdc-list-item__text">Thêm bài viết</span>
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
                >Tiêu đề</th>
                <th
                    class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric"
                    role="columnheader"
                    scope="col"
                    style="text-align: left; vertical-align: middle; font-weight: bold;"
                >Mô tả ngắn</th>
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
                @foreach($articles as $article)
                    <tr class="mdc-data-table__row">
                        <th class="mdc-data-table__cell" scope="row" style="position: relative;">
                            <img
                                src="{{($article->article_image) ? $article->article_image : 'https://cdn.iconscout.com/icon/free/png-256/docs-1-93408.png'}}"
                                width="35"
                                height="35"
                                style="position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%);border-radius: 50%;"
                            />
                        </th>
                        <td
                            class="mdc-data-table__cell mdc-data-table__cell--numeric" title="{{$article->article_name}}"
                            style="text-align: left; vertical-align: middle;"
                        > <a href="{{route('articles.detail',$article->article_id)}}">{{$article->article_name}}</a></td>
                        <td
                            class="mdc-data-table__cell mdc-data-table__cell--numeric" title="{{$article->article_name}}"
                            style="text-align: left; vertical-align: middle;"
                        >{{$article->article_short_des}}</td>
                        <td
                            class="mdc-data-table__cell"
                            style="text-align: left; vertical-align: middle;"
                        >{{$article->created_at}}</td>
                        <td class="mdc-data-table__cell" style="text-align: center; vertical-align: middle;">
                            <div style="display: flex;position: relative">
                                <a
                                    @click="menuItemClicked('Statistics')"
                                    class="mdc-list-item w-button-add" title="Xem chi tiết"
                                    href="{{route('articles.detail',$article->article_id)}}"
                                    aria-current="page" style="left: 22%!important"
                                >
                                    <span class="mdc-list-item__ripple"></span>
                                    <i
                                        class="material-icons"
                                        aria-hidden="true"
                                    > visibility</i>
                                </a>
                                <a
                                    @click="menuItemClicked('Statistics')" title="Chỉnh sửa"
                                    class="mdc-list-item w-button-add ml-action-button"
                                    href="{{route('articles.edit',$article->article_id)}}"
                                    aria-current="page" style="left: -7%!important"
                                >
                                    <span class="mdc-list-item__ripple"></span>
                                    <i
                                        class="material-icons"
                                        aria-hidden="true"
                                    > edit</i>
                                </a>
                                <a
                                    {{--                           @click="menuItemClicked('Statistics')"--}}
                                    class="mdc-list-item w-button-add btnShowDialogArticles"
                                    href="#" title="Xóa"
                                    data-article-id="{{ $article->article_id }}"
                                    aria-current="page" style="left: -1%!important">
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
                                                <form class="delArticleItem" method="GET">
                                                    @csrf
                                                    @method('delete')
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
        {{ $articles->links() }}
    </div>
@endsection
