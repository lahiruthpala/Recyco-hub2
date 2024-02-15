<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recyco-hub</title>
    <link rel="stylesheet"  type="text/css" href="<?=ROOT?>/css/style1.css">
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
   
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="/images/RecycoHub.png" alt="logo"></a>
            </div>
            <ul class="links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Blog</a></li>
            </ul>
            <a href="<?=ROOT?>/login" class="button_login-button">Login</a>
            <a href="<?=ROOT?>/Signup" class="button_signup-button">Sign Up</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="center-content">
        <h1>Welcome to Recyco-hub</h1>
        <p>Please log in or sign up to continue</p>
    </div>

    <script>
        gsap.from('h1',1.2,{opacity:0, y:-80, delay: 1.5})
        gsap.from('body',1.2,{opacity:0, y:150, delay: 0.5})
    </script>

    <footer>
        <p>&copy; 2023 RecycoHUB. All rights reserved.</p>
    </footer>
</body>
</html>
