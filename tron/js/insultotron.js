function insultotron() {


	var a_1 = new Array(
		'Espèce de'
	);

	var a_2 = new Array(
		'petit salaud',
		'vieux batard',
		'gros fils de pute',
		'vieil enculé',
		'sale connard',
		'grosse vache'
	);

	var a_3 = new Array(
		'de ta race',
		'de ta mère',
		'qui pue',
		'débile',
		'assexué'
	);

	var a_4 = new Array(
		'tu pues comme',
		'tu es',
		'tu as la forme d\'',
		'tu pourrais être',
		'tu ressembles à',
		'tu vaux pas mieux que',
		'tu me fais penser à'
	);

	var a_5 = new Array(
		'un petit bouffon.',
		'un gland.',
		'une sale merde.',
		'un gros naze.'
	);

	var a_6 = new Array(
		'Je voudrais',
		'J\'aurais aimé',
		'Je songe à',
		'Je sais pas ce qui me retient de',
		'Je rêve de'
	);

	var a_7 = new Array(
		't\'éclater la gueule',
		'te brûler la cervelle',
		't\'éclater la tête',
		'te broyer les couilles'
	);

	var a_8 = new Array(
		'gros con.',
		'sale con.',
		'sale pute.'
	);

	choose = function(tableau) {
		var len = tableau.length;
		var i = Math.floor(Math.random()*len);
		return tableau[i];
	}

	output.innerHTML = choose(a_1)+' '+choose(a_2)+' '+choose(a_3)+' '+choose(a_4)+' '+choose(a_5)+' '+choose(a_6)+' '+choose(a_7)+' '+choose(a_8);
}
