<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
    <style type="text/css">
        body {
            font-family: 'Roboto';
            background-color: #E8EAF6;
        }

        .sign-up-container {
            width: 100%;
            height: 100%;
            background: #eceff1;
        }

        .sign-up-box {
            background: white;
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 400px;
            height: 370px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .sign-up-box img {
            margin-bottom: 20px;
        }

        .sign-in-form {
            width: 100%;
        }

        section {
            margin-bottom: 10px;
        }

        .mdc-text-field {
            width: 100%;
        }

        .mdc-button {
            margin-top: 15px;
            width: 100%;
            height: 40px;
        }

        .sign-in-form > section:first-child {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="sign-up-container">

    <div class="sign-up-box">

        <img
            style="border-radius: 50%;"
            src="https://i.imgur.com/g7G4nLG.png"
            width="83"
            height="83"
            alt="logo"
        />
        <form @submit.prevent="submitSignIn" class="sign-in-form">
            <section>
                <h4 style="font-size: 17px; margin: 0px 0px 20px 0px;">Đặt lại mật khẩu mới</h4>

            </section>

            <section>
                <label class="mdc-text-field mdc-text-field--filled email">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        id="password"
                        class="mdc-text-field__input "
                        type="password"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Mật khẩu mới</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span style="font-size: 13px; color: red; font-family: 'Roboto';" class="error error_password"></span>
            </section>

            <section>
                <label class="mdc-text-field mdc-text-field--filled password">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        id="confirm_password"
                        class="mdc-text-field__input "
                        type="password"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Xác nhận mật khẩu</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span style="font-size: 13px; color: red" class=" error error_confirm_password"></span>
            </section>

            <button type="submit" class="mdc-button mdc-button--raised">
                <span class="mdc-button__label">Xác nhận</span>
            </button>
        </form>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        const txtEmail = new mdc.textField.MDCTextField(
            document.querySelector(".email")
        );

        const txtPassword = new mdc.textField.MDCTextField(
            document.querySelector(".password")
        );

        const button = new mdc.ripple.MDCRipple.attachTo(
            document.querySelector(".mdc-button--raised")
        );

        const resetPassword = document.querySelector('button');
        const passwordInput = document.querySelector('#password');
        const confirmPasswordInput = document.querySelector('#confirm_password');
        const __urlResetPassword = '/admin/reset-password';
        const __urlResetPasswordDone = '/admin/reset-password/done';
        const __token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');


        document.querySelector('form').onsubmit = event => event.preventDefault();

        resetPassword.onclick = () => {
            clearError();
            let password = passwordInput.value;
            let confirm_password = confirmPasswordInput.value;

            if (!minLength(password, 6)) {
                renderError(".error_password", "Mật khẩu phải có tối thiểu 6 ký tự");

            }

            if (!same(password, confirm_password)) {
                renderError('.error_confirm_password', "Mật khẩu không trùng khớp");
                return 0;
            }

            fetch(__urlResetPassword, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": __token,
                    referrerPolicy: 'no-referrer',
                },
                credentials: "same-origin",
                body: JSON.stringify({
                    password: password,
                    token: token,
                }),
            })
                .then(response => response.json())
                .then(response => {
                    if (response.status === 200) {
                        window.location.href = '/admin';
                    }
                })
                .catch(error => console.log(error))


        }

        const renderError = (selector, message) => {
            document.querySelector(selector).innerHTML = message;
        }

        const clearError = () => {
            $(".error").html("");
        }

        const minLength = (value, length) => value.length >= length;
        const same = (firstValue, secondValue) => firstValue === secondValue;

    });
</script>
</html>
