var vueApp = new Vue({
	el:'#app',
	data: {
		equipes: []
	},
	methods: {
		changeTime: function(index) {
			for (var i = 0;i < this.equipes.length;i++) {
				if (i == index) continue;
				console.log(this.equipes[i]);
				if (this.equipes[i].id == this.equipes[index].id) {
					//alert('valores iguais');
				}
			}
		}
	}
});
