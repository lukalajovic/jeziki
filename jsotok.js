$('#navodila').ready(function(){
	$('#navodila').hide();
	$('#odgovor').hide();
	$('#pokazi_odgovor').hide()
	$('#tabela').hide();
	$('#je_ni').hide();
})
$('#jabolka').click(function(){
	$('#je_ni').text("narobe");
})
$('#pomarance').click(function(){
	$('#je_ni').text("zelo narobe");
})
$('#mesano').click(function(){
	$('#je_ni').text("pravilno");
})
vidise=false;
$('#pokazi').click(function(){
	if(vidise==false){
		$('#navodila').slideDown();
		vidise=true;
		$('#tabela').slideDown();
		$('#pokazi_odgovor').show();
		$('#je_ni').show();
	}
	else{
		$('#navodila').slideUp();
		$('#tabela').slideUp();
		vidise=false;
		$('#pokazi_odgovor').hide();
		$('#je_ni').hide();
	}
})

$('#pokazi').mouseover(function(){
	$('#pokazi').removeClass();
})
$('#pokazi').mouseout(function(){
	$('#pokazi').addClass("naslov");
})
vidise2=false;
$('#pokazi_odgovor').click(function(){
	if(vidise2==false){
		$('#odgovor').slideDown();
		vidise2=true;
		
	}
	else{
		$('#odgovor').slideUp();
		vidise2=false;

	}
})
razred2=false;

$('#jabolka').mouseover(function(){
	$('#jabolka').removeClass();
	$('#jabolka').addClass('vprasanje2');
})

$('#pomarance').mouseover(function(){
	$('#pomarance').removeClass();
	$('#pomarance').addClass('vprasanje2');
})

$('#mesano').mouseover(function(){
	$('#mesano').removeClass();
	$('#mesano').addClass('vprasanje2');
})


$('#jabolka').mouseout(function(){
	$('#jabolka').removeClass();
	$('#jabolka').addClass('vprasanje');
})

$('#pomarance').mouseout(function(){
	$('#pomarance').removeClass();
	$('#pomarance').addClass('vprasanje');
})

$('#mesano').mouseout(function(){
	$('#mesano').removeClass();
	$('#mesano').addClass('vprasanje');
})