/*function loginsucesso()
{
    setTimeout("window.location = '../php/teladeprodutos.php'", 2000);
}

function loginfalhou()
{
    setTimeout("window.location = '../php/login.php'", 2000);
}*/
function validaCPF(field)
{
	//var cpf = field.value;
	var cpf = document.getElementById("idcpf").value;
	var soma = 0;
	var resto = 0;
	//var controle = true;

	// retira os pontos e traços da máscara
	cpf = cpf.replace(".", "");
	cpf = cpf.replace(".", "");
	cpf = cpf.replace("-", "");

	for(i=1; i<=9; i++)
	{

		soma += (parseInt(cpf.substring(i-1, i))) * (11-i);
		resto = ( soma * 10 ) % 11;
		// soma = a*10 + b*9 + c*8.....

	}

	if( resto == 10 || resto == 11 )
	{
		resto = 0;
	}
	if( resto != parseInt(cpf.charAt(9)) )
	{
		//inválido
		alert("CPF inválido!");
		document.getElementById("idcpf").value="";
	}
	else
	{
		//return true;                           
	}

	//segundo digito
	soma = 0;
	for( i=1; i<=10; i++ )
	{
		soma += (parseInt(cpf.substring(i-1, i))) * (12-i);
		resto = ( soma * 10 ) % 11;
	}
	if( resto == 10 || resto == 11 )
	{
		resto = 0;
	}
	if( resto != parseInt(cpf.charAt(10)) )
	{
		//inválido
		alert("CPF inválido!");
		document.getElementById("idcpf").value="";
	}
	else
	{

		//return true;
	                            
	}                        
	if (cpf.length != 11 || 
	cpf == "00000000000" || 
	cpf == "11111111111" || 
	cpf == "22222222222" || 
	cpf == "33333333333" || 
	cpf == "44444444444" || 
	cpf == "55555555555" || 
	cpf == "66666666666" || 
	cpf == "77777777777" || 
	cpf == "88888888888" || 
	cpf == "99999999999")
	{
		alert("CPF inválido!");
		document.getElementById("idcpf").value="";
	}
}
function somenteLetra(){
    // Variavel com os dígitos válidos
    var sDigitos=" qwertyuiopasdfghjklçzxcvbnmQWERTYUIOPASDFGHJKLÇZXCVBNMáéíóúÁÉÍÓÚãõÃÕâêîôûÂÊÎÔÛ"
    
    // Variavel que vai capturar a tecla pressionada
    var cTecla = event.key;
    // Procura um caractere dentro de uma String
    if(sDigitos.indexOf(cTecla) ==-1){
        return false;
    } else {
        return true;
    }
}
function somenteNumeros(){
    // Variavel com os dígitos válidos
    var sDigitos="0123456789.,()-";
    
    // Variavel que vai capturar a tecla pressionada
    var cTecla = event.key;
    // Procura um caractere dentro de uma String
    if(sDigitos.indexOf(cTecla) ==-1){
        return false;
    } else {
        return true;
    }
}
