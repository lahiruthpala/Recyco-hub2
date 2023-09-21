const showDialogBtn = document.getElementById('showDialogBtn');
const closeDialogBtn = document.getElementById('closeDialogBtn');
const overlay = document.getElementById('overlay');

showDialogBtn.addEventListener('click', () => {
    overlay.style.display = 'flex'; // Display the overlay
});

closeDialogBtn.addEventListener('click', () => {
    overlay.style.display = 'none'; // Hide the overlay
});