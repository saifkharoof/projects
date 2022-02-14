document.addEventListener('DOMContentLoaded', function() {

    var button = document.querySelector('#menubtn')
    var menu = document.querySelector('.main-menu')

    button.addEventListener('click', function(){
       menu.classList.toggle('main-menu');
    })

    });