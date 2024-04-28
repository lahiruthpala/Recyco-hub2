let percent = document.querySelector('.percent');
let progress = document.querySelector('.progress');
let text = document.querySelector('.text');
let barWidth = 0;
let barProgressPercent = 0;
let loadingAnimation = setInterval(animate, 50);

function animate() {
    if (barProgressPercent === 50 && barWidth === 200) {
        percent.classList.add('text-blink');
        if (barProgressPercent === 100) {
            text.style.display = "block";
        }
        clearInterval(loadingAnimation);
    } else {
        barWidth = barWidth + 4;
        barProgressPercent = barProgressPercent + 1;
        progress.style.width = barWidth + 'px';
        percent.textContent = barProgressPercent + '%';
    }
}