let a = document.getElementById('form');
a.addEventListener('submit',function(e){
  var erreur;
  var inputs= this.getElementsByTagName("input");
  
  var id = document.getElementById("inpNumeroEtudiant");
  var exid = /^[0-9]{8}$/;
  
  for(var i=0;i<inputs.length;i++){
    if(!inputs[i].value){
      erreur= "Veuillez renseigner tout les champs";
    }else if(exid.test(id.value)== false){
      erreur= "Le numéro étudiant doit comporter 8 chiffres"
      e.preventDefault();
    }
  }

  


  if(erreur){
    e.preventDefault();
    document.getElementById("erreur").innerHTML = erreur;
    return false
  } 
});