function onlyAlfa(e)
{	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8) return true;
	patron =/[A-Za-z ��������]/;
	tecla_final = String.fromCharCode(tecla);
	if (!patron.test(tecla_final))
	{ e.keyCode = 0;  }
} 