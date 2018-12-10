function validarFormato(){
	var _this = $(this);
	if(_this.val() == 'pontosCorridos' || _this.val() == 'eliminatorias') $('#qtdGrupo').hide();
	else $('#qtdGrupo').show();
}

$(function(){
	$('#formato').change(validarFormato).trigger('change');
});