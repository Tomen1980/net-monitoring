@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div>
    
</div>

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
@endsection