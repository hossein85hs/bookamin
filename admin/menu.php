<nav class="navbar nav-pills position-sticky top-0 menu-sidebar text-center w-100 bg-brown
 h-75 shadow rounded-bottom">
<div class="w-100  h-75 ">
    <div class="row mb-5 mb-sm-3  align-items-center h-25">
        <div class="logo my-3 w-100 col ">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                 fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468
                      11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>
        <div>
            hello , <?= $_SESSION['username'] ?>
        </div>
    </div>
    <div class="row  align-items-center h-75">
        <ul class="navbar-nav w-100 col ">
            <a href="?page=article"><li class="nav-item">مقالات</li></a>
            <a href="?pages=article"><li class="nav-item">article</li></a>
            <a href="?pages=article"><li class="nav-item">article</li></a>
            <a href="?pages=article"><li class="nav-item">article</li></a>
        </ul>
    </div>

</div>
</nav>