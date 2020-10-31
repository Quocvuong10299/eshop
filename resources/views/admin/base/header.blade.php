<header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
        <section
            class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start"
        >
            <button
                class="mdc-top-app-bar__navigation-icon mdc-icon-button material-icons"
                href="#"
            >
                menu
            </button>
            <a
                class="mdc-top-app-bar__title"
                href="https://www.webdenim.io"
                target="_blank"
                style="color: inherit"
            >Timewise</a
            >
        </section>
        <section
            class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end"
            role="toolbar"
        >
            <button
                @click="logout()"
                class="material-icons mdc-top-app-bar__action-item mdc-icon-button"
                aria-label="power_settings_new"
            >
                power_settings_new
            </button>
        </section>
    </div>
</header>
