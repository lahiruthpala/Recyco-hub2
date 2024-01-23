<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recyco-Hub</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/lib/style1.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="/public/images/logo.jpg" alt="Startup Logo">
        </div>
        <nav>

            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="/private/views/Customer/loginform.html">Login</a></li>
                <li><a href="/private/views/Customer/signupform.html">Signup</a></li>
                <!-- <li><a href="#contact">Contact</a></li> -->
            </ul>
        </nav> 
    </header>

    <section id="hero">
        <h1>Welcome to Recyco-Hub</h1>
        <a href="#contact" class="cta-button">Get Started</a>
    </section>
    <section id="process">
        <h2>3 easy steps to sell your scrap</h2>
        <div class="processor-elements">
            <div class="process-step">
                <img src="/public/images/calendar.png" alt="Schedule Icon"><br>
                <span>1. Choose material</span>
            </div>
            <div class="process-step">
                <img  src="/public/images/truck1.jpg" alt="Collect Icon"><br>
                <span>2. Schedule Pickup</span>
                <p>Select your preferred date and the scrap pickup location</p>
            </div>
            <div class="process-step">
                <img src="/public/images/payment.png" alt="Payment Icon"><br>
                <span>3. Receive Payment</span>
                <p>Receive payments in most secured way</p>
            </div>
        </div>
    </section>

    <section id="process">
        <h2>What we do at RecycoHUB</h2>
        <div class="mainprocess-cycle">
            <section class="mainprocess-cycle-two-stages">
                <div class="process-step">
                    <div class="row-element1">
                        <div class="row-element1-column1">
                            <img src="/public/images/waste collector.png" alt="Schedule Icon">
                        </div><br>
                        <div class="row-element1-column2">
                            <h2>1.</h2>
                            <p>We send our collection truck/collector <br>to collect from your doorstep</p>
                        </div>
                    </div>
                </div>
                <div class="row-element2">
                    <img class="arrow" src="/public/images/arrow.png">
                </div>
                <div class="process-step">
                    <div class="row-element1">
                        <div class="row-element1-column1">
                            <img src="/public/images/inspect waste.jpg" alt="Collect Icon">
                        </div>
                        <div class="row-element1-column2">
                            <h2>2.</h2>
                            <p>We inspect and sort recyclable waste <br>and pay for customers</p>    
                        </div>                    
                    </div>
                </div>
            </section>
            <!-- <div class="row-element2">
                <img class="left-moved-arrow" id="rotate270" src="images/arrow.png">
            </div> -->
            <section class="mainprocess-cycle-two-stages">
                <div class="process-step">
                    <div class="row-element1">
                        <div class="row-element1-column1">
                            <img src="/public/images/awareness.png" alt="Payment Icon">
                        </div>
                        <div class="row-element1-column2">
                            <h2>4.</h2>
                            <p>We publish awareness sessions <br>and events to public that can take part</p>
                        </div>
                    </div>
                </div>
                <div class="row-element2">
                    <img class="arrow" id="rotate180" src="/public/images/arrow.png">
                </div>
                <div class="process-step">
                    <div class="row-element1">
                        <div class="row-element1-column1">
                            <img src="/public/images/sell sorted waste.jpg" alt="Deliver Icon">
                        </div>
                        <div class="row-element1-column2">
                            <h2>3.</h2>
                            <p>We sell our sorted waste <br>to recycling centers</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


    <section id="about">
        <iframe width="100%" height="750px" src="https://www.youtube.com/embed/rWK8G2E3Aa4?si=6b-o0vjGaFJ6xvf1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        
    </section>

    <section id="features">
        <h2>Key Features</h2>
        <ul>
            <li>Innovative Solutions</li>
            <li>User-Friendly Design</li>
            <li>Scalable Architecture</li>
            <li>24/7 Customer Support</li>
        </ul>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Ready to take your project to the next level? Contact us today!</p>
        <a href="mailto:info@yourstartup.com" class="cta-button">Email Us</a>
    </section>

    <footer>
        <p>&copy; 2023 RecycoHUB. All rights reserved.</p>
    </footer>

</body>
</html>
