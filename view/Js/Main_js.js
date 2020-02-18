// sidebar toggle
const btnToggle = document.querySelector('.toggle-btn');

btnToggle.addEventListener('click', function () {
  console.log('clik')
  document.getElementById('sidebar').classList.toggle('active');
  console.log(document.getElementById('sidebar'))
  document.getElementById('navbar2').classList.toggle('active');
  console.log(document.getElementById('sidebar'))
});
