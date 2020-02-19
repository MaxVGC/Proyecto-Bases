// sidebar toggle
const btnToggle = document.querySelector('.toggle-btn');

btnToggle.addEventListener('click', function () {
  console.log('clik');
  document.getElementById('sidebar').classList.toggle('active');
  console.log(document.getElementById('sidebar'));
  document.getElementById('navbar2').classList.toggle('active');
  console.log(document.getElementById('navbar2'));
  document.getElementById('div_notas').classList.toggle('active');
  console.log(document.getElementById('sidebar'));
  document.getElementById('div_pass').classList.toggle('active');
  console.log(document.getElementById('sidebar'));
});

const btnChangePass = document.querySelector('.toggle-div-pass');

btnChangePass.addEventListener('click', function () {
  console.log('clik');
  document.getElementById('div_pass').classList.toggle('pass');
  document.getElementById('div_notas').classList.toggle('hidden');
});


