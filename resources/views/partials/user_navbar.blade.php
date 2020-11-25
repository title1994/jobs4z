<nav class="navbar fixed-top align-items-start navbar-expand-lg pl-0 pr-0 py-0 bg-dark">

    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center bg-dark">
        <a class="navbar-brand mr-0" href="{{ url('/') }}">
            <label style="color:red;font-size:40px;">4z.com</label>
        </a>
    </div>

    <div class="bg-dark">
        @if (app('impersonate')->isImpersonating())
            <a href="{{ route('impersonate.leave') }}" class="navbar-toggler text-danger hidden-md">
                <i class="fas fa-user-secret"></i>
            </a>
        @endif

        <button class="navbar-toggler mr-3"
                type="button"
                data-toggle="collapse"
                data-target="#top-navigation"
                aria-controls="top-navigation"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars text-muted"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse bg-dark" id="top-navigation">

        <ul class="navbar-nav ml-auto pr-3 flex-row">
            <div class="nav-item">
                <a href="{{ route('userproducts.index') }}" id="product_button">
                    @lang('Account recharge')
                </a>
            </div>
            <div class="nav-item">
                <select>
                    <option value='English'>English</option>
                    <option value='French'>French</option>
                </select>
            </div>
            <div class="nav-item">
                @if (Auth::check())
                <a href="{{ route('auth.logout') }}" id="logout_button">
                    @lang('Logout')
                </a>
                @else
                <a href="{{ route('auth.login') }}" id="login_button">
                    @lang('Login')
                </a>
                @endif
            </div>
        </ul>
    </div>
</nav>
