function openModal(target) {
  const modal = document.getElementById(target)
  modal.style.display = 'block'
}

document.querySelectorAll('.modal-close').forEach(closeBtn => {
  closeBtn.onclick = function () {
    target = span.getAttribute('modal_target')
    const modal = document.getElementById(target)
    modal.style.display = 'none'
  }
})
