const duration = document.getElementById('dur')
const startTime = document.getElementById('start')
const endTime = document.getElementById('end')
const cost = document.getElementById('cost')
const errorElement = document.getElementById('error')


form.addEventListener('submit', (e) => {
  let messages = []

  if (startTime.value >= endTime.value) {
    messages.push('Временной интервал задан некорректно')
  }

  if (startTime.value < "10:00" || startTime.value >= "22:00" || endTime.value <= "10:00" || endTime.value > "22:00") {
    messages.push('Режим работы: 10:00 — 22:00')
  }

  if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
  }
})
