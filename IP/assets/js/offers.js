
/*==================== SHOW SCROLL UP ====================*/ 
function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    // When the scroll is higher than 200 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 200) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

// let addCart_btns = document.querySelectorAll(".gallery__button");
//     addCart_btns.forEach((btn)=>{
//         btn.addEventListener("click",handle_addCartItem);
//     })

// export function handle_addCartItem(){
//     let title = document.getElementById("offer_item_name").innerHTML;
//     let imgsrc = document.getElementById("gallery__img").src;
//     let price = document.getElementById("offer_item_newprice").innerHTML;
//     console.log(title,price,imgsrc)

//     let newToAdd = {
//         title,
//         price,
//         imgsrc,
//     };
// }
