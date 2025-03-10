function closeModal() {
    document.getElementById('sendModal').classList.add('hidden');
    document.getElementById('reciveModal').classList.add('hidden');
    document.getElementById('currencyModal').classList.add('hidden');
    document.getElementById('settingsModal').classList.add('hidden');
      }

function toggleSend() {
document.getElementById('sendModal').classList.toggle('hidden')
}
function toggleSettings() {
document.getElementById('settingsModal').classList.toggle('hidden')
}
function toggleRecive() {
document.getElementById('reciveModal').classList.toggle('hidden')
}
function addCurrenncyModal() {
document.getElementById('currencyModal').classList.toggle('hidden')
}


