 function verif()
    {
        var val1 = document.getElementById("motDePasse1").value,
        val2 = document.getElementById("motDePasse2").value,
        result = document.getElementById("result");
        if(val1!=val2){
        result.innerHTML="Invalide !"
        return false;
    }
        else {
            console.log(val1);
        result.innerHTML="Valide !";
        return true;
    }}
