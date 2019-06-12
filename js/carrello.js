
// Click on a close button to hide the current list item
var checkbox = document.getElementsByTagName("input");
// console.log(checkbox);
var btn = document.getElementById("btn"),
    pro = document.getElementById("pro"),
    prezzo = document.getElementsByClassName('price_pizza'),
    tot = document.getElementById('totale');
    btn.disabled = true;//blocco il pulsante
    pro.disabled = true;//blocco il pulsante
function check (){
  var i, conta = 0, price = 0 ,convert ;
for (i = 0; i < checkbox.length; i++) {
  if(checkbox[i].checked == false){conta++; }else{
    convert =  parseFloat(prezzo[i].innerHTML);//il prezzo
    price = convert + price //il prezzo totale
    console.log(price);
    tot.innerHTML = price +'€';
  }
}



  // console.log(conta);
  if (conta == checkbox.length) {
    btn.disabled = true;
    pro.disabled = true;

  } else {
    btn.disabled = false;
    pro.disabled = false;

  }
}

btn.onclick = function (){
  return confirm('sei sicuro di voler cancellare questo ordine ?');
}
// btn.onclick = window.onload();
  /*
  del[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";

    var req = new XMLHttpRequest();

      req.onreadystatechange = function(){

          if (this.status == 200 && this.readyState == 4) {
               res = this.responseText ;
               console.log(res);
          }
      }
      req.open("GET", "../php/del_carrello.php?x="+ i, true);
            req.send();

  }
*/
