<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
    <style type="text/css">
        body {
            font-family: 'Roboto';
            background-color: #E8EAF6;
        }
        .form-container {
            width: 100%;
            height: 100%;
            background: #eceff1;
        }
        .form-wrapper {
            background: white;
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 400px;
            height: 400px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .form-wrapper  {
            margin-bottom: 20px;
        }

        section {
            margin-bottom: 10px;
            width: 100%;
        }

        .mdc-text-field {
            width: 100%;
        }

        .mdc-button {
            margin-top: 15px;
            width: 100%;
            height: 40px;
        }

        .information {
            margin-bottom: 40px;
        }

        .information > div > div {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            max-width: 358px;
            justify-content: center;
            max-height: 43px;
        }

        .information p {
            word-break: break-word;
        }

        .information > div {
            margin-left: auto;
            margin-right: auto;
            max-width: 358px;
            border-radius: 20px;
            border: 1px solid #dadce0;
            height: 32px;
            background-color: #E8EAF6;
        }

        .information > div:hover {
            cursor: pointer;
            background-color: #f7f8f8;
        }

        .information i {
            margin-top: 3px;
            margin-left: 8px;
            padding-top: 0.3rem;
            margin-right: auto;

        }

        .information p {
            padding-top: 3px;
        }
    </style>
</head>
<body>
<div class="form-container">

    <div class="password-form">
        <div class="form-wrapper">
            <img
                style="border-radius: 50%;"
                src="https://i.imgur.com/g7G4nLG.png"
                width="83"
                height="83"
                alt="logo"
            />
            <div style="text-align: center">
                <h4 style="font-size: 17px; margin: 10px 0px 10px 0px;"></h4>
                <div class="information">
                    <div>
                        <div>
                            <p style="color: #000; padding: 3px 10px 5px 10px;"></p>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <label class="mdc-text-field mdc-text-field--filled password">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        autofocus
                        class="mdc-text-field__input"
                        type="password"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        name="password"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Nhập mật khẩu của bạn</span>
                    <span class="mdc-line-ripple "></span>
                </label>
                <span style="font-size: 13px; color: red; font-family: 'Roboto';" class="error error-password">  </span>
            </section>

            <a href="" class="forgot_password">Quên mật khẩu</a>
            <button type="button" class="mdc-button mdc-button--raised btn-submit-password">
                <span class="mdc-button__label ">Đăng nhập</span>
            </button>

        </div>
    </div>

    <div class="email-form">
        <div class="form-wrapper">

            @if(session('message_done'))
                <p style="color: green;">{{ session('message_done') }}</p>
            @endif

            <img
                style="border-radius: 50%;"
                src="https://i.imgur.com/g7G4nLG.png"
                width="83"
                height="83"
                alt="logo"
            />

            <div style="text-align: center">
                <h4 style="font-size: 20px; margin: 10px 0px 10px 0px;">Đăng nhập</h4>
                <p style="font-size: 15px; color: #666;">Sử dụng tài khoản Admin của bạn</p>
            </div>

            <section>
                <label class="mdc-text-field mdc-text-field--filled email">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        v-model="email"
                        class="mdc-text-field__input"
                        type="text"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        name="email"

                    />
                    <span class="mdc-floating-label" id="my-label-id">Email</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span style="font-size: 13px; color: red; font-family: 'Roboto';" class="error error-email"></span>
            </section>

            <button type="button" class="mdc-button mdc-button--raised btn-submit-email">
                <span class="mdc-button__label ">Tiếp theo</span>
            </button>

        </div>
    </div>

</div>
</body>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

<script>
    const txtEmail = new mdc.textField.MDCTextField(
        document.querySelector(".email")
    );
    const txtPassword = new mdc.textField.MDCTextField(
        document.querySelector(".password")
    );
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let __urlForgotPassword = '/admin/forgot-password';
    const __urlSignUp = '/admin/sign-up';
    const __urlCheckEmail = '/admin/check/email/';
    const __urlCheckPassword = '/admin/check/password';
    const __urlDashboard = '/admin/dashboard';
    const email = document.querySelector('input[name="email"]');
    const password = document.querySelector('input[name="password"');
    const btnEmailSubmit = document.querySelector('.btn-submit-email');
    const btnPasswordSubmit = document.querySelector('.btn-submit-password');
    const errorEmail = document.querySelector('.error-email');
    const errorPassword = document.querySelector('.error-password');
    const emailForm = document.querySelector('.email-form');
    const passwordForm = document.querySelector('.password-form');
    const selectEmail = document.querySelector('.information');
    const forgotPassword = document.querySelector('.forgot_password');

    forgotPassword.onclick = event => {
        event.preventDefault();

        __urlForgotPassword += `?email=${email.value}`;

        window.location.href = __urlForgotPassword;

    }


    function validateEmail() {
        return email.value !== '';
    }

    function renderError(selector, message) {

        switch (selector) {
            case 'email':
                errorEmail.innerHTML = message;
                break;
            case 'password':
                errorPassword.innerHTML = message;
                break;
        }

    }

    function passEmail(name, email) {
        const titleName = passwordForm.querySelector('h4');
        const titleEmail = passwordForm.querySelector('.information').querySelector('p');

        emailForm.style.display = 'none';
        passwordForm.style.display = 'block';
        txtPassword.focus();

        titleName.innerHTML = `Xin chào ${name}`;
        titleEmail.innerHTML = email;
    }


    function submitEmail(callback) {
        const url = __urlCheckEmail + email.value;

        fetch(url)
            .then(response => response.json())
            .then(callback)
    }

    function handleSubmitEmail() {
        if (validateEmail()) {
            submitEmail(function (response) {
                const {status: status, name: name, email: email} = response;

                switch (status) {
                    case 200:
                        passEmail(name, email);
                        break;

                    case 404:
                        window.location.href = __urlSignUp;
                        break;
                }

            });
        } else
            renderError('email', 'Vui lòng nhập email');
    }

    btnEmailSubmit.addEventListener('click', handleSubmitEmail);
    email.addEventListener('keypress', event => {
        event.which === 13 ? handleSubmitEmail() : null;
    })

    function submitPassword(callback) {
        fetch(__urlCheckPassword, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
                referrerPolicy: 'no-referrer',
            },
            credentials: "same-origin",
            body: JSON.stringify({
                email: email.value,
                password: password.value,
            }),
        })
            .then(response => response.json())
            .then(callback)
            .catch(error => console.log(error))

    }

    function handleSubmitPassword() {
        submitPassword(function (response) {
            let status = response.status;
            switch (status) {
                case 200:
                    window.location.href = __urlDashboard;
                    break;
                case 401:
                    renderError('password', 'Mật khẩu không chính xác');
                    break;
            }
        });
    }

    btnPasswordSubmit.addEventListener('click', function () {
        handleSubmitPassword();
    });
    password.addEventListener('keypress', event => {
        if (event.which === 13) handleSubmitPassword();
    })


    function start() {
        txtEmail.focus();

    }

    selectEmail.addEventListener('click', function () {
        passwordForm.style.display = 'none';
        emailForm.style.display = 'block';
    })

    start();

</script>


</html>
