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

function spliceJogador(index){
	appEquipes.jogadores.splice(index,1);
}

function spliceEquipe(index){
	vueApp.equipes.splice(index,1);
}

$(function (){
	/*var teste = $('option');
	for (var i = 0; i < teste.keys(teste).lenght; i--) {

	}*/
});

