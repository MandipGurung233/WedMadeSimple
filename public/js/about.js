let btnMiss = document.querySelector('#btnMiss');
let btnVis = document.querySelector('#btnVis');
let btnVal = document.querySelector('#btnVal');
let content = document.querySelector('#content');
var btn = $('.aboutButton');

btnMiss.addEventListener('click', () => {
    btn.addClass('activeMiss');
    btn.removeClass('activeVis');
    btn.removeClass('activeVal');
    content.innerHTML = '<p>The cyber threat prospect is constantly increasing. Majority of the companies are not well armed with cyber security tools hence,resulting into successful breaches. <br><br> Our cyber security solutions are tailored to focus on all the possible cyber-attack surfaces your organization might have. tailored applicationyour tailored application tailored applicationyour tailored application</p>';
});

btnVis.addEventListener('click', () => {
    btn.addClass('activeVis');
    btn.removeClass('activeMiss');
    btn.removeClass('activeVal');
    btn.removeClass('as');
    content.innerHTML = '<p>Mobile application is a portal to wider spectrum of services that cannot be provided by website alone. Our team consists of skilled mobile app developers who are <br><br> devoted to add more creative advantages to  your tailored applicationyour tailored applicationyour tailored applicationyour tailored application. tailored applicationyour tailored application tailored applicationyour tailored application</p>';
});

btnVal.addEventListener('click', () => {
    btn.addClass('activeVal');
    btn.removeClass('activeMiss');
    btn.removeClass('activeVis');
    btn.removeClass('as');
    content.innerHTML = '<p>Hey there  is a portal to wider spectrum of services that cannot be provided by website alone. Our team consists of skilled mobile app developers who are <br><br> highly skilled man power to add more creative advantages to  your tailored application your tailored applicationyour tailored applicationyour tailored application tailored applicationyour tailored application tailored applicationyour tailored application.</p>';
});