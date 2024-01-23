<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Webpage Title</title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT ?>/css/lib/setpickup.css">
</head>
<body> 

    <header>  
        <img src="images/logo.jpg" alt="Your Logo">
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <section class="first">
        <div class="firstsection">
            <div class="description">
                <p>This is a description of the section. It can include some information about your content.</p>
            </div>
            <br>
            <div class="buttons">
                <button> Home</button>
                <button>Office</button>
            </div>
        </div>
        <br>
        <div class="firstsection2">
            <div class="image">
                <img src="images/garbage bag.jpg" alt="Image Description">
            </div>
        </div>
    </section>
    <section class="second">
        <span class="heading">
            How it works
        </span>
        <br>
        <div class="row1">
            <div class="row1-column1">
                <img class="checklist" src="images/checklist.png" alt="checklist">
            </div>
            <div class="row1-column2"><p>You/Your facility send the required details by <br>
                filling the relevant form.</p>
            </div>
            <div class="row1-column3">
                <img src="images/arrow.png" alt="arrow" class="arrowrow1">
            </div>
        </div>
        
        <div class="row2"><br>
            <div class="row2-column1">
                <img class="garbagetruck" src="images/garbage truck.png" alt="garbage truck">
            </div>
            <div class="row2-column2">
                <p>We send our collection truck <br>
                to collect polythene/plastic from your <br>
                doorstep.</p>
            </div>
        </div>
        <div class="row3">
            <div class="column1">
                <img src="images/garbage bags.png" alt="garbage bag">
            </div>
            <div class="column2">
                <p>
                    We offer points or rewards<br>
                    according to the material quantity <br>
                    in predefined prices.
                </p>
            </div>
        </div>
    </section>

</body>
</html>
