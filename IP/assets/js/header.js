const search = () => {
    let filter = document.getElementById('search__item').value.toUpperCase();
    let ul = document.getElementsByClassName('gallery__block');
    let ul2 = document.getElementsByClassName('cart__content');

    // let ul = main_div.getElementsByTagName('a');
    
    for ( let i =0 ; i < ul.length ; i++){
        let li = ul[i].getElementsByTagName('p');
        let text = li[0].textContent || li[0].innerHTML;
        
        if(text.toUpperCase().indexOf(filter) > -1){
            ul[i].style.display = "";
        }
        else{
            ul[i].style.display = "none";
        }
    }

    for ( let j =0 ; j < ul2.length ; j++){
        let li = ul2[j].getElementsByClassName('cart__product__title');
        let text = li[0].textContent || li[0].innerHTML;
        
        if(text.toUpperCase().indexOf(filter) > -1){
            ul2[j].style.display = "";
        }
        else{
            ul2[j].style.display = "none";
        }
    }
}