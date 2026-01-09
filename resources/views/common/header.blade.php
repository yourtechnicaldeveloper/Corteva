<nav class="navbar navbar-light px-3 d-flex justify-content-between align-items-center sticky-top bg-white">
    <a class="navbar-brand m-0" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.jpg') }}"
             height="32"
             alt="Corteva">
    </a>

    <div class="dropdown" style="position: relative;">
        <img src="{{ asset('img/language-logo.png') }}"
             class="dropdown-toggle"
             data-bs-toggle="dropdown"
             style="cursor:pointer;width: 40px;"
             alt="Language">

        <ul class="dropdown-menu header_dropdown">
            <li><button class="dropdown-item" data-lang="hi">हिन्दी</button></li>
            <li><button class="dropdown-item" data-lang="gu">ગુજરાતી</button></li>
            <li><button class="dropdown-item" data-lang="en">English</button></li>
        </ul>
    </div>
</nav>
