<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halcon</title>
    <!-- Include Bootstrap CSS file from a CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .account-menu {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid black;
            padding: 10px;
            z-index: 1;
        }

        .account:hover .account-menu {
            display: block;
        }

        .account-button:hover {
            cursor: pointer;
        }

        .navbar-brand img {
            height: 100%;
            max-height: 70px;
            padding: 10px;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-right: 20px;
        }

        .nav-item:last-child {
            margin-right: 0;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                flex-direction: column;
            }

            .nav-item {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .nav-item:last-child {
                margin-bottom: 0;
            }
        }

        footer {
            background-color: white;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        footer div {
            display: flex;
            gap: 20px;
        }

        footer p {
            margin: 0;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Halcon_logo_and_slogan.png" alt="Halcon">
                </a>
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/support">Support</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Dashboard</a>
                    </li>
                    @endauth
                </ul>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item account">
                    <div class="nav-link account-button">
                        Account
                    </div>
                    <div class="account-menu">
                <!-- Authentication links -->
                @guest
                @if (Route::has('login'))
                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Logout') }}</a>
                </form>
                @endguest
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="py-4">
    @yield('content')
  </main>
    </div>
    </html>
<footer style="background-color: white; height: 80px; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
    <div style="display: flex; gap: 20px;">
        <p>Contact: 1-800-123-4567</p>
        <p>Headquarters: #123 Main Street, Country</p>
    </div>
</footer> 
    <script>
        const accountButton = document.querySelector('.account-button');

        accountButton.addEventListener('click', () => {
            accountButton.classList.toggle('active');
        });
    </script>
</body>

