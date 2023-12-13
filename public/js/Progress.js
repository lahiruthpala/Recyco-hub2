var currentCard, nextCard, prevCard;

var animationEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

document.querySelectorAll('.next').forEach(function (nextButton) {
    nextButton.addEventListener('click', function (e) {
        e.preventDefault();
        currentCard = this.parentElement.parentElement;
        nextCard = currentCard.nextElementSibling;

        // Activate next step on progress bar
        var index = Array.from(document.querySelectorAll('.card')).indexOf(nextCard);
        document.querySelectorAll('#bar li')[index].classList.add('active');

        // Hide current card and show the next one
        var inAnimation = 'animated slideInLeft';
        var outAnimation = 'animated bounceOutRight';

        currentCard.style.display = 'none';

        nextCard.style.display = 'block';
        nextCard.classList.add(inAnimation);

        nextCard.addEventListener(animationEvents, function animationEndHandler() {
            nextCard.classList.remove(inAnimation);
            nextCard.removeEventListener(animationEvents, animationEndHandler);
        });
    });
});

document.querySelectorAll('.prev').forEach(function (prevButton) {
    prevButton.addEventListener('click', function (e) {
        e.preventDefault();
        currentCard = this.parentElement.parentElement;
        prevCard = currentCard.previousElementSibling;

        // De-activate current step on progress bar
        var index = Array.from(document.querySelectorAll('.card')).indexOf(currentCard);
        document.querySelectorAll('#bar li')[index].classList.remove('active');

        // Show the previous card and hide the current
        var inAnimation = 'animated slideInRight';
        currentCard.style.display = 'none';

        prevCard.style.display = 'block';
        prevCard.classList.add(inAnimation);

        prevCard.addEventListener(animationEvents, function animationEndHandler() {
            prevCard.classList.remove(inAnimation);
            prevCard.removeEventListener(animationEvents, animationEndHandler);
        });
    });
});
