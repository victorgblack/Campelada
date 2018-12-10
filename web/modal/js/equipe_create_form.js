var appEquipes= new Vue({
	el:'#appEquipes',
	data: {
		jogadores: []
	},
	methods: {
		pushJogador:function() {
			this.jogadores.push({nome: '', id: null});
		}
	}
});