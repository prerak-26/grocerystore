// import { handle_addCartItem } from "../js/offers";
//start when document gets ready
if(document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded',start);
}else{
    start();
}

//================= Start ================
function start(){
    addEvents();
}

//=========== Update and Rerender =========
function update(){
    addEvents();
    updateTotal();
}

//=========== Add events ==============
function addEvents(){
    //remove items 
    let cartRemove_btns = document.querySelectorAll(".cart__itm__remove");
    cartRemove_btns.forEach((btn)=>{
        btn.addEventListener("click",handle_removeCartItem);
    });

    let cartQuantity_inputs = document.querySelectorAll(".cart__quantity");
    cartQuantity_inputs.forEach((input)=>{
        input.addEventListener("change", handle_changeItemQuantity);
    });

    const buy_btn = document.querySelector(".btn__buy");
    buy_btn.addEventListener("click", handle_buyOrder);
}

function handle_removeCartItem(){
    this.parentElement.remove();
    update();
}

function handle_changeItemQuantity(){
    if(isNaN(this.value) || this.value < 1){
        this.value = 1;
    }
    this.value = Math.floor(this.value);
    update();
}

function handle_buyOrder(){
    let cart = document.querySelectorAll(".cart__content");
    cart.length > 0 ? alert("Your Order has been placed & \nBill has been sent on Email") : alert("There is no Order to Place \nPlease make an Order first");
    alert("Your Order has been placed & \nBill has been sent on Email") ? 
    cart.forEach((rmv)=>{
        rmv.style.display = ""
    }) : 
    cart.forEach((rmv)=>{
        rmv.style.display = "none"
    });
    const newtotal = 0;
    document.getElementsByClassName("total__price")[0].innerHTML = "$" + newtotal.toFixed(2);
}

function updateTotal(){
    let cartBoxes = document.querySelectorAll(".cart__content");
    // const cart = document.querySelector(".cart__container");
    const totalElement = document.querySelectorAll(".total__price");
    let total = 0;
    cartBoxes.forEach((cartBox)=>{
        let priceElement = cartBox.querySelector(".cart__price");
        let price = parseFloat(priceElement.innerHTML.replace("$",""));
        let quantity = cartBox.querySelector(".cart__quantity").value;
        total += price*quantity;
    })
    total = total.toFixed(2);
    totalElement[0].innerHTML = "$" + total;
}

// function CartBoxComponent(title,price,imgsrc){
//     return `<div class="cart__content">
//                 <div class="cart__img__box">
//                     <img src="${imgsrc}" alt="" class="cart__img gallery__img">
//                 </div>
//                 <span class="cart__line"></span>
//                 <div class="detail__box">
//                     <div class="cart__product__title">${title}</div>
//                     <div class="cart__price">${price}</div>
//                     <input type="number" value="1" class="cart__quantity">
//                 </div>
//                 <div class="cart__itm__remove">
//                     <i class="ri-delete-bin-5-fill cart__remove"></i>
//                 </div>
//             </div>`
// }


