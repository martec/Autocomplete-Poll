$(document).ready(function(){
	$("[name=updateoptions]").after('<button id="atcomplete">Auto Complete</button>');
	($.fn.on || $.fn.live).call($(document), 'click', '#atcomplete', function (e) {
		e.preventDefault();
		heightwin = window.innerHeight*0.6;
		$('body').append('<div class="atcomplete"><div style="overflow-y: auto;max-height: ' + heightwin + 'px !important; "><table cellspacing="0" cellpadding="5" class="tborder"><tr><td class="thead" colspan="2"><div><strong>List:</strong></div></td></tr><td class="trow1"><textarea id="list_textarea" style="width:99%;height: ' + heightwin * 0.8 + 'px;" ></textarea></td></table></div><center><button id="sv_apoll" style="margin:4px;">Complete Poll</button></center></div>');
		$('.atcomplete').modal({ zIndex: 7 });
	});
	($.fn.on || $.fn.live).call($(document), 'click', '#sv_apoll', function (e) {
		e.preventDefault();
		list = document.getElementById("list_textarea").value;
		if (list.trim()){
			list_split = list.split(/\n/);
			n_lopt = list_split.length;
			n_opt = $("[name^=options]").length;
			n = '';
			if (n_lopt > n_opt) {
				n = n_opt;
			}
			else {
				n = n_lopt;
			}
			for (var i=0; i < parseInt(n); i++) {
				if (/\S/.test(list_split[i])) {
					s = i;
					s+=1;
					document.getElementsByName("options["+s+"]")[0].value = list_split[i].trim();
				}
			}
		}
		$.modal.close();
	});
});