function verif()
    {
        /*on recupére le champ email et code postal du formulaire*/
        var adresse_email = document.formulaire_contact.email.value;
        var code_postal = document.formulaire_contact.cp.value;
        /*regex pour savoir si l'email contient lettre . chiffre @ lettre chiffre point extension */
        var verif 	= /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
        if (verif.exec(adresse_email) == null){
            alert(adresse_email  + "ce n'est pas une adresse email valide");
          
            return false;
        }
        
        /*on calcul si la longueur de chiffre est inférieur à 5 chiffres et supérieur à 0 chiffre*/
        if (code_postal.length < 5 && code_postal.length > 0 )
		  {
            alert(code_postal  + "ce n'est pas un code postal valide"); 
        
            return false;
        }
        console.log(adresse_email + " " +  code_postal);
          
    }