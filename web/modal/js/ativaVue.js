function pushEquipe() {
        vueApp.equipes.push({id: null});
}
function pushJogador() {
        vueApp.jogadores.push('');
}

function pushVarios(){
	var qtd = document.getElementById('qtdEquipe');
	console.log(qtd.value);
	for(i=0;i<qtd.value;i++){
		console.log(qtd.value);
		vueApp.equipes.push({id: null});
	}
}


$(function (){
	/*var teste = $('option');
	for (var i = 0; i < teste.keys(teste).lenght; i--) {

	}*/
});

