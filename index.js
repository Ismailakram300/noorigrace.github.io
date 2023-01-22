//for humabrger javascript
hamburger   = document.querySelector('.hamburger')
menu_bar =document.querySelector('.menu-bar-res')
menubar_ul=document.querySelector('.menu-bar-ul-res')
nav_li =document.querySelector('.nav-li')
logo=document.querySelector('.logo_res')
 
 hamburger.addEventListener('click',()=>{
    menu_bar.classList.toggle('menu-bar-res');
    menubar_ul.classList.toggle('menu-bar-ul-res');
    nav_li.classList.toggle('nav-li');
    logo.classList.toggle('logo_res');
    
 }

 )