function countPrice(){
    let quantity=document.getElementById('quantity');
    let result=document.getElementById('result');
    let silver=document.getElementById('silver');
    let gold=document.getElementById('gold');

    let price=parseInt(quantity.value)*50;
    if(silver.checked){
        price=price*0.95;
    }
    if(gold.checked){
        price=price*0.9;
    }

    if(parseInt(quantity.value)<=0){
        result.innerHTML="Ilość musi byc większa od 0";
        quantity.classList.add('error');
    }
    else{
        result.innerHTML="Wartość zamowienia wynosi: "+price+"zl";
        result.classList.remove('error');
    }
    
}