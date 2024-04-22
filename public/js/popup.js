const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')
console.log(openModalButtons);
openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    console.log("clicked");
    const modal = document.querySelector(button.dataset.modalTarget)
    console.log(modal);
    openModal(modal)
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal) {
  console.log(modal);
  if (modal == null) return
  modal.classList.add('active')
  modal.style.display = 'block';
  overlay.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}