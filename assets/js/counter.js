$(document).ready(function(){
	$(function(){
		$(window).on("scroll", function(){
			var win_height = $(this).height();
			var win_pos    = $(this).scrollTop();
			var top_pos    = $(".counters-deck").position().top;
			var card_heigth = $(".counter-card").height();
			if($(".counters-deck").css("grid-template-columns") == "100%"){
				card_heigth += $(".description-card").height();
			}
	
			if(win_pos >= top_pos + card_heigth - win_height){
				const counters = document.querySelectorAll('.counter');
				const speed = 2500;
				
				counters.forEach(counter => {
					const updateCount = () => {
						const target = +counter.getAttribute('data-target');
						const count = +counter.getAttribute('data-actual');
						
						const inc = target / speed;
						
						if(count < target){
							counter.innerText = Math.round(count + inc);
							counter.setAttribute('data-actual', count+inc);
							setTimeout(updateCount, 1);
						}
						else{
							count.innerText = target;
						}
					}
					updateCount();
				});
			}
		});
	});
});