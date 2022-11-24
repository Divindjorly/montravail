const validarLogin = () => {
    alert('Teste');
  }


  console.log("ouuuuh aala");
  
  document.querySelector("button").addEventListener('click', submit);
  function submit(event) {
    var name = document.getElementById("name").value;
   
    var lastname = document.getElementById("lastname").value;
    var l = name.length;
    var l1=lastname.length;
    console.log(name);
    console.log("ikdsnkj");
    var onlyLetters = /^[a-zA-Z]*$/.test(name);
    console.log(onlyLetters);
      if(onlyLetters==true && l>3 ){
          console.log("nom correcte");
      }
      else{
          document.getElementById("nn").innerHTML = "<p >le nom doit contenir seulement des alphabets et plus de 3 caractéres</p>";
      }

      var onlyLetters = /^[a-zA-Z]*$/.test(lastname);
    console.log(onlyLetters);
      if(onlyLetters==true && l1>3 ){
          console.log("nom correcte");
      }
      else{
          document.getElementById("ll").innerHTML = "<p style='color:red'>le nom doit contenir seulement des alphabets et plus de 3 caractéres</p>";
      }


  }
  function nameValidation(){
        
    var name=document.getElementById("name").value;
    var onlyLetters = /^[a-zA-Z]*$/.test(name);
    console.log(onlyLetters);
    if(onlyLetters==true && name.length>3){
      document.getElementById("verif").innerHTML = "<p style='color:green'>correcte</p>";
    }
    else{
      document.getElementById("verif").innerHTML = "<p style='color:red'>erreur</p>";  }
   
  }

  function LastNameValidation(){
        
    var lastname=document.getElementById("lastname").value;
    var onlyLetters = /^[a-zA-Z]*$/.test(lastname);
    console.log(onlyLetters);
    if(onlyLetters==true && lastname.length>3){
      document.getElementById("verif1").innerHTML = "<p style='color:green'>correcte</p>";
    }
    else{
      document.getElementById("verif1").innerHTML = "<p style='color:red'>erreur</p>";  }
   
  }




  
                