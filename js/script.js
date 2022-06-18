window.onscroll = function(){
    const docScrollTop =document.documentElement.scrollTop;

    if(window.innerWidth>991 || window.innerWidth<991 ){
        if(docScrollTop>30){
            document.querySelector(".mainnavbar").classList.add("sticky");
        }
        else{
            document.querySelector(".mainnavbar").classList.remove("sticky");
        }

    }
}

// hamburger

const hamBurger= document.querySelector('.hamburger');

hamBurger.addEventListener("click",function(){
    document.querySelector(".mainnavbar .menu").classList.toggle("active");
    document.querySelector(".hamburger i").classList.toggle("active");
});