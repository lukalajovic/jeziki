
function notr(value, array) {
  return array.indexOf(value) > -1;
}


function zaporedje(n){
	var g=1;
	var seznam=new Array();
	while(g<n+1){
		var f=Math.floor(Math.random()*n+1);
		if(notr(f,seznam)==false){
			//document.write(f);
			seznam.push(f);
			g+=1;
		}
		}					
	return seznam;	
}
function naredin(n){	
	var g=0;
	var seznam= new Array();
	while(g<n){
		var f=Math.floor(Math.random()*10);
		//var f=7;
		seznam.push(f);
		g+=1;		
	}
	return seznam;
}
navodila_prikazana=false;
$(document).ready(function(){
	$("#navodila").hide();
})
$('#gumb_navodila').click(function(){
	if(navodila_prikazana==true){
		$("#navodila").hide();
		navodila_prikazana=false;
	}
	else{
		$("#navodila").show();
		navodila_prikazana=true;
	}
	
})

function nakljucna_tabela(a,b){
	var sez=new Array();
	for(var x = 0; x < a; x++){
		var sez1=new Array();
		for(var y = 0; y<b; y++){
			sez1.push(Math.floor(Math.random() * a*b));
		}
		sez.push(sez1);
	}
	return sez;
}

function nakljucna_tabela2(a,b){
	var sez2=zaporedje(a*b);
	
	var sez=new Array();
	var k=0;
	for(var x = 0; x < a; x++){
		var sez1=new Array();
		for(var y = 0; y<b; y++){
			sez1.push(sez2[k]);
			k+=1;
		}
		sez.push(sez1);
	}
	return sez;	
}