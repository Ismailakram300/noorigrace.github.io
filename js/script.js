let userBox = document.querySelector('.nav-li .menubar_ul .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.nav-li .menubar_ul .menubar-ul');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.nav-li .menubar_ul').classList.add('active');
   }else{
      document.querySelector('.nav-li .menubar_ul').classList.remove('active');
   }
}