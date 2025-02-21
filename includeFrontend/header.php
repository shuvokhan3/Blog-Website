<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
<style> 
  /* Header Responsive Styles */
@media (max-width: 767px) {
  .site-logo img {
    max-height: 40px; /* Smaller logo on mobile */
  }
  
  .navbar-toggler {
    padding: 4px 8px;
    border: none;
  }
  
  .navbar {
    padding: 10px 0;
  }
  
  .col-8.col-md-4 {
    padding-left: 15px;
  }
  
  .col-4.col-md-8 {
    padding-right: 15px;
  }
  /* Header and Mobile Menu Styles */
.header-main {
    position: relative;
    background: white;
    z-index: 9999;
}
}

@media (max-width: 767px) {
    .navbar-collapse.mobile-menu {
        position: fixed;
        top: 60px;
        left: -280px; /* Start off-screen */
        width: 280px;
        height: 100vh;
        background: white;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        transition: all 0.3s ease-in-out;
        z-index: 9998;
    }

    .navbar-collapse.mobile-menu.show {
        left: 0; /* Slide in */
    }

    .nav-item {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    .nav-link {
        font-size: 16px;
        color: #333;
        padding: 8px 0;
        display: block;
        width: 100%;
    }
}

/* Add this to ensure the main content stays below */
main, 
.site-content, 
.content-area {
    position: relative;
    z-index: 1;
}
</style>
<header role="banner">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-9 social">
          <a href="#"><span class="fa fa-twitter"></span></a>
          <a href="#"><span class="fa fa-facebook"></span></a>
          <a href="#"><span class="fa fa-instagram"></span></a>
          <a href="#"><span class="fa fa-youtube-play"></span></a>
        </div>
        <div class="col-3 search-top">
          <form action="#" class="search-top-form">
            <span class="icon fa fa-search"></span>
            <input type="text" id="s" placeholder="Type keyword to search...">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container header-main">
    <div class="row align-items-center">
      <div class="col-8 col-md-4">
        <h1 class="site-logo mb-0">
          <a href="index.php">
            <img src="images/blogImageLogo.png" alt="Blog Logo" style="max-height: 60px; width: auto;">
          </a>
        </h1>
      </div>
      <div class="col-4 col-md-8 d-flex justify-content-end">
        <nav class="navbar navbar-expand-md navbar-light w-100">
          <button class="navbar-toggler ml-auto" type="button" id="mobileMenuToggle">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse mobile-menu" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Business</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="category.html">Travel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('navbarMenu');
    
    // Toggle menu when clicking hamburger icon
    menuToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle('show');
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
            mobileMenu.classList.remove('show');
        }
    });

    // Prevent menu close when clicking inside menu
    mobileMenu.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


