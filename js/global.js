function global(forml)
{
    function blancos(forml)
    {
        var i
        for(i=0;i<7;i++)
            {    
                if(forml.elements[i].value.length==0)
                    {
                        alert("Tiene que rellenar todos los campos")
                        forml.elements[i].focus();
                        return false;
                    }
            }
    return true;
    }
    function compruebamail(forml)
    {
        var con1= forml.email.value
        var con2=forml.conmail.value
		
		if(forml.email.value.indexOf("@")==-1)
        {
            alert("El correo no es correcto"); return false;
        }
        if(forml.email.value.lastIndexOf(".")==-1)
        {
            alert("El correo no es correcto"); return false;
        }
		if(con1!=con2)
        {
			alert("El email no coincide");
        	return false;
		}
        return true;
    }
    function contrasena(forml)
    {
        var con1= forml.contra.value;
        var con2= forml.concontra.value;
        if(con1!=con2)
        {
			alert("Las contraseña no coincide");
        	return false;
		}
        return true;
    }
	
	if ( (blancos(forml) && compruebamail(forml)) &&  (contrasena(forml)) )
	{
		return true;
	}
	else
	{
		return false;
	}
	
}
