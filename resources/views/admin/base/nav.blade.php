<aside class="mdc-drawer mdc-drawer--dismissible app-drawer">
    <nav class="mdc-drawer__drawer">
        <nav class="mdc-drawer__content">
            <div id="icon-with-text-demo" class="mdc-list">
                <a  @click="menuItemClicked('Order')"
                    class="mdc-list-item {{ (strpos(Route::currentRouteName(), '/') === 0) ? 'mdc-list-item--activated' : '' }}" href="/"
                    aria-current="page"
                >
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >show_chart</i
                    >
                    <span class="mdc-list-item__text">Thống kê</span>
                </a>
                <a @click="menuItemClicked('Order')" class="mdc-list-item"  href="#">
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >receipt</i
                    >
                    <span class="mdc-list-item__text">Đơn hàng</span>
                </a>
                <a  class="mdc-list-item {{ (strpos(Route::currentRouteName(), 'categories') === 0) ? 'mdc-list-item--activated' : '' }}" href="{{route('categories')}}">
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >toc</i
                    >
                    <span class="mdc-list-item__text">Danh mục</span>
                </a>
                <a  class="mdc-list-item {{ (strpos(Route::currentRouteName(), 'articles') === 0) ? 'mdc-list-item--activated' : '' }}" href="{{route('articles')}}">
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >playlist_add</i
                    >
                    <span class="mdc-list-item__text">Thêm bài viết</span>
                </a>
                <a
                    @click="menuItemClicked('Product')"
                    class="mdc-list-item"
                    href="#"
                >
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >watch</i
                    >
                    <span class="mdc-list-item__text">Sản phẩm</span>
                </a>
                <a
                    @click="menuItemClicked('Account')"
                    class="mdc-list-item mdc-list-item-user "
                    href="#"
                >
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >person</i
                    >
                    <span class="mdc-list-item__text">Tài khoản</span>
                </a>
                <a
                    @click="menuItemClicked('Settings')"
                    class="mdc-list-item"
                    href="#"
                >
                    <span class="mdc-list-item__ripple"></span>
                    <i
                        class="material-icons mdc-list-item__graphic"
                        aria-hidden="true"
                    >settings</i
                    >
                    <span class="mdc-list-item__text">Cài đặt</span>
                </a>
            </div>
        </nav>
    </nav>
</aside>
