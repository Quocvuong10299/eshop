$(document).ready(function () {
    // Instantiate MDC Drawer
    const drawerEl = document.querySelector(".mdc-drawer");
    const drawer = new mdc.drawer.MDCDrawer.attachTo(drawerEl);
    drawer.open = true;
    // Instantiate MDC Top App Bar (required)
    const topAppBarEl = document.querySelector(".mdc-top-app-bar");
    const topAppBar = new mdc.topAppBar.MDCTopAppBar.attachTo(topAppBarEl);

    topAppBar.setScrollTarget(document.querySelector(".main-content"));
    topAppBar.listen("MDCTopAppBar:nav", () => {
        drawer.open = !drawer.open;
    });

    // Show the dialogs on the page when delete item
    const dialogElement = document.querySelector(".mdc-dialog");
        const dialog = new mdc.dialog.MDCDialog(dialogElement);
    const contentElement = document.querySelector(".mdc-dialog__content");
    dialog.listen('MDCDialog:accept', () => {
        dialog.open();
        contentElement.setAttribute('aria-hidden', 'true');
    });
    dialog.listen('MDCDialog:cancel', () => {
        dialog.close();
    });

    $('.btnShowDialog').on('click', function (e) {
        let idItem = $(this).attr('data-cate-id');
        dialog.open();
        $('.delCateItem').attr('action', '/admin/categories/delete/' + idItem);
    });

    $('.btnShowDialogArticles').on('click', function (e){
        let idItem = $(this).attr('data-article-id');
        dialog.open();
        $('.delArticleItem').attr('action', '/admin/articles/delete/' + idItem);
    })

    //set_timeout alert notify
    setTimeout(function () {
        $('.alert').remove();
    }, 2000);


    // const selectElement = document.querySelector('.mdc-select');
    // const select = new MDCSelect(selectElement);
});

//function review image before upload
function reviewImage() {
    $('#upload-photo').change(function (event) {
        let reviewImage = URL.createObjectURL(event.target.files[0]);
        $('#upload-image').attr('src', reviewImage);
    })
}
