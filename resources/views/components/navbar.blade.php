<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-lg-5">
    <div class="container-fluid">
        <!-- Sidebar toggle button -->
        <button class="btn btn-outline-light me-3" type="button" id="menuButton">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="gap-2 navbar-brand d-flex justify-content-center align-items-center" href="/">
            <img src="{{ asset('img/PostBox.png') }}" alt="PostBox" width="45">
            <span class="text-brand" id="text-brand">PostBox</span>
        </a>
    </div>
</nav>
