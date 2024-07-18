<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')

    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const profileButton = document.getElementById('profileButton');
            const profileDropdown = document.getElementById('profileDropdown');
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            const profileMobileButton = document.getElementById('profileMobileButton');
            const profileMobileDropdown = document.getElementById('profileMobileDropdown');

            profileButton.addEventListener('click', () => {
                profileDropdown.classList.toggle('hidden');
            });

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            profileMobileButton.addEventListener('click', () => {
                profileMobileDropdown.classList.toggle('hidden');
            });
        });
    </script>
</body>


</html>
