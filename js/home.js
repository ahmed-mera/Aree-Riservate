$('.btn').on('click',function(){

var src   =   $(this).parent().find('input:nth-of-type(1)').val(),
    pizza =   $(this).parent().find('input:nth-of-type(2)').val(),
    price =  $(this).parent().find('input:nth-of-type(3)').val();

// console.log(src );
// console.log(pizza );
// console.log(price );
$.post('../php/add.php',
{
  src   : src ,
  pizza : pizza,
  price :price
},
function(number){
  $('.number').html(number);
  // console.log(number);
}

)

});





/*

//controllo la data
function control_date(){

     var data = Date.parse(document.getElementById("scadenza").value),//data inserita
          btn = document.forms[0].elements[2],//il button
          now = Date.parse(new Date());//la data di oggi
          if (data < now){ btn.setAttribute('title','non puoi scegliere una data già scaduta');  btn.disabled = true; }
          else {  btn.disabled = false; btn.setAttribute('title','');}

          }

//per la data di oggi
(function setDate () {
var  time  = new Date(),
    day   = time.getDate(),
    month = time.getMonth(),
    year  = time.getFullYear(),
    months =  ["01","02","03","04","05","06","07","08","09","10","11","12"],
    x = document.getElementById("scadenza");
    if(day < 10){day = '0'+day;}
     x.value = year+'-'+months[month]+'-'+day;
    // console.log(day);
}());
*/
$('.carousel').carousel({
  interval: 5000
})
