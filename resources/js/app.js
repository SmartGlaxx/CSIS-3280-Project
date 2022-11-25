import './bootstrap';

function showAdmins(){
    document.querySelector('.adminOptions').classList.toggle('not-show');
    document.querySelector('.icon1').classList.toggle('not-show');
}

function hideAdmins(){
    document.querySelector('.adminOptions').classList.add('not-show');
}