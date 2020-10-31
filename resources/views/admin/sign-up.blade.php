<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
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
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
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
            height: 40px;
        }

        .error {
            font-size: 13px;
            color: red;
            font-family: 'Roboto';
            display: none;
        }

        .alert {
            width: 100%;
            height: 30px;
            padding-top: 5px;
            text-align: center;
        }

        .alert-warning {
            border-color: #f5c6cb;
            border-radius: .25rem;
            background-color: #f8d7da;
            color: #721c24;
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
        <h4 style="font-size: 20px; margin: 0px 0px 20px 0px;">Tạo tài khoản Admin</h4>
        @if(session('signup.failed'))
            <div class="alert alert-warning">
                {{session('signup.failed')}}
            </div>
        @endif
        <form action="{{ route('admin.handleSignUp') }}" method="post" class="sign-in-form">
            @csrf
            <section>
                <label class="mdc-text-field mdc-text-field--filled fullName">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        class="mdc-text-field__input"
                        type="text"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        id="fullName"
                        name="fullName"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Họ và tên</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span class="error">Invalid email</span>
            </section>

            <section>
                <label class="mdc-text-field mdc-text-field--filled email">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        class="mdc-text-field__input"
                        type="email"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        id="email"
                        name="email"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Email</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span class="error">Invalid email</span>
            </section>


            <section>
                <label class="mdc-text-field mdc-text-field--filled password">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        class="mdc-text-field__input"
                        type="password"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        id="password"
                        name="password"
                    />
                    <span class="mdc-floating-label" id="my-label-id">Mật khẩu</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span class="error">Invalid email</span>
            </section>

            <section>
                <label class="mdc-text-field mdc-text-field--filled confirmPassword">
                    <span class="mdc-text-field__ripple"></span>
                    <input
                        class="mdc-text-field__input"
                        type="password"
                        aria-labelledby="my-label-id"
                        aria-controls="my-helper-id"
                        aria-describedby="my-helper-id"
                        id="confirmPassword"

                    />
                    <span class="mdc-floating-label" id="my-label-id">Xác nhận mật khẩu</span>
                    <span class="mdc-line-ripple"></span>
                </label>
                <span class="error">Invalid email</span>
            </section>

            <button type="submit" class="mdc-button mdc-button--raised" style="width: 300px; margin-left: 115px;">
                <span class="mdc-button__label">Tạo tài khoản</span>
            </button>
        </form>
    </div>
</div>
</body>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        const txtFullName = new mdc.textField.MDCTextField(
            document.querySelector(".fullName")
        );

        const txtEmail = new mdc.textField.MDCTextField(
            document.querySelector(".email")
        );


        const txtPassword = new mdc.textField.MDCTextField(
            document.querySelector('.password')
        );

        const txtConfirmPassword = new mdc.textField.MDCTextField(
            document.querySelector('.confirmPassword')
        );

        const button = new mdc.ripple.MDCRipple.attachTo(
            document.querySelector(".mdc-button--raised")
        );


    });
</script>


<script>
    function clearErrorMessage() {
        document.querySelectorAll('.error').forEach(item => {
            item.style.display = 'none';
        })
    }

    function checkObjectEmpty(obj) {
        return JSON.stringify(obj) == '{}';
    }


    const rules = [
        ['#fullName', 'required', 'Họ tên không được để trống'],
        ['#email', 'isEmail', 'Email không hợp lệ'],
        ['#password', 'min:6', 'Password phải có tối thiểu 6 chữ số'],
        ['#confirmPassword', 'same', 'Xác nhận mật khẩu không trùng khớp'],

    ];

    class Validator {
        constructor(rules) {

            let message = {};
            document.querySelector('form').onsubmit = event => {
                let message = {};
                clearErrorMessage();
                rules.forEach(item => {
                    const [selector, rules, warning] = item;
                    const value = document.querySelector(selector).value;

                    switch (rules) {
                        case 'required':
                            !this.required(value) ? message[selector] = warning : null;
                            break;

                        case 'isEmail':
                            !this.isEmail(value) ? message[selector] = warning : null;
                            break;

                        case 'min:6':
                            !this.min(value, 6) ? message[selector] = warning : null;
                            break;

                        case 'same':
                            const confirmPassword = document.querySelector('#password').value;

                            !this.same(value, confirmPassword) ? message[selector] = warning : null;
                            break;
                        case 'isPhone':
                            !this.isPhone(value) ? message[selector] = warning : null;
                            break;
                    }
                })

                if (!checkObjectEmpty(message)) {
                    event.preventDefault();
                    for (let i in message) {
                        const parent = document.querySelector(i).parentNode.parentNode;
                        const error = parent.querySelector('.error');
                        error.style.display = 'block';
                        error.innerHTML = message[i];
                    }
                }

            }

        }

        required(value) {
            return value.length != 0;
        }

        isEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        min(value, length) {
            return value.length >= length;
        }

        same(value, valueConfirm) {
            return value === valueConfirm;
        }

        isPhone(value) {
            return value.length === 10 && Number(value);
        }
    }


    $(document).ready(function () {

        new Validator(rules);
    });
</script>
</html>
