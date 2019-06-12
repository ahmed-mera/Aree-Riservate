$(function () {
  var $tmp = 200;
  //------------------------------------------------------------------------------------------------------
// per il nome e il cognome
$('.fname , .lname , .email').blur(function () {
  //il controllo sul nome e il cognome
  if ($(this).val().length < 3) {
    $(this).css('border','1px solid red').parent().find('.alert').fadeIn($tmp);//ci sono errori
}else{
    $(this).css('border','1px solid green').parent().find('.alert').fadeOut($tmp).end().find('.ob').fadeOut($tmp);// tutto a posto

}
});
//----------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
// per la password


$('.pass , .conf-pass').blur(function () {
//il controllo sulla password

if($(this).val() == ''){
  $(this).css('border','1px solid red').parent().find('.alert').fadeIn($tmp);//ci sono errori
}
else{
  $(this).css('border','1px solid green').parent().find('.alert').fadeOut($tmp).end().find('.ob').fadeOut($tmp);// tutto a posto

}

});

//----------------------------------------------------------------------------------------------------------------


});

/*
 var form = document.forms[0].elements,
     err = document.getElementsByClassName('alert'),
     ast = document.getElementsByClassName('ob');


form[0].onblur = controlla(this.value);


function controlla (x) {
  if (this.length < 4) {
err[0].style.display = 'block';
  }


}
*/
