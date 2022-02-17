let btnMiss = document.querySelector('#btnMiss');
let btnMisss = document.querySelector('#btnVal');
let content = document.querySelector('#content');
var btn = $('.aboutButton');

btnMiss.addEventListener('click', () => {
    btn.addClass('activeMiss');
    btn.removeClass('activeVal');
    content.innerHTML = '<p><i class="bi bi-hand-thumbs-up-fill"></i> &nbsp;Liked</p>'
});

btnMisss.addEventListener('click', () => {
    btn.removeClass('activeMiss');
    btn.addClass('activeVal');
    content.innerHTML = '<p><i class="bi bi-hand-thumbs-up-fill"></i> &nbsp;Like</p>'
});

