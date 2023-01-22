var kolvo = {};
var tovar={};
var chst = {};

$(document).ready(function() {
	$('.of').on('click', of);


});

function header(id) {
	$.get('functions/cart.php?id=', {id: id}, function(data){
	tovar[id]=data;
	});
}

function showcartbutton() {
	//tovar[999]='d';
	//kolvo[999]='';
	showMiniCart();
	saveCart();
}

function addToCart() {
	//add to cart
	var id = $(this).attr('data-id');
	header(id);
    if (kolvo[id]==undefined) {
    	kolvo[id]=1;
		
	}
	else {
		kolvo[id]++;
	}
	
	showMiniCart();
	saveCart();
}


function showMiniCart() {
	out='';
for (var key in tovar) {
	if (tovar[key]!='d') {
			out+= tovar[key] + ':' + kolvo[key] + '' + '<br>';
			$('.cart-out').html(out);
			}
	}
}

function loadcart() {
	if (localStorage.getItem('tovar')) {
		tovar = JSON.parse(localStorage.getItem('tovar'));
		kolvo = JSON.parse(localStorage.getItem('kolvo'));
	}

}

function saveCart() {
	localStorage.setItem('tovar', JSON.stringify(tovar));
	localStorage.setItem('kolvo', JSON.stringify(kolvo));
}


function of() {
	var numberz='Номер Вашего заказа: ';
	console.log('fdf');
	$.get('functions/buy.php', { tovar: tovar, kolvo: kolvo }, function(data){
		numberz += data;
		$('.numberz').html(numberz);
		localStorage.setItem('numberz', JSON.stringify(data));
	});
	localStorage.removeItem('tovar');
	localStorage.removeItem('kolvo');
	$('.cart-out').hide();
	$('.numberz').html(numberz);
	$('.otminet').show();
}

function proverz() {
	var numz=JSON.parse(localStorage.getItem('numberz'));
	var textz = 'Вы сделали заказ. Номер Вашего заказа: ';
	if (numz) {
		textz+=numz;
		$('.checkz').html(textz);
		$('main').hide();
		$('.showcart').hide();
		$('.otminet').show();
		var kolvo = chst;
		var tovar = chst;
	}
}


$(document).ready(function() {
	loadcart();
	$('.otminet').hide();
	proverz();
	$('.addToCart').on('click', addToCart);
	$('.showcart').on('click', showcartbutton);

});
