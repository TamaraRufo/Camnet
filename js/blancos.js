function blancos(formulario)
{
	var i;
	for(i=0;i<2;i++)
		{    
			if(formulario.elements[i].value.length==0)
				{
					alert("Tiene que rellenar todos los campos");
					formulario.elements[i].focus();
					return false;
				}
		}
return true;
}