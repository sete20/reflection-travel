/**
 * @author		Ahmed Aboelsaoud Ahmed <ahmedsaoud31@gmail.com>
 * @viber		+201148024524
 * @whatsup		+201148024524
 * @github		https://github.com/ahmedsaoud31
 * @site		http://goo2pro.com
 */
var bsWidgets = (function(){
	// @var to save instance of this class
	var thisClass = {};
	
	/* 
	*  @function alert
	*  @return alert widget
	*/
	thisClass.alert = function(type, message){
		var html = '<div class="alert alert-'+type+'" role="alert">';
			html += message;
			html += '</div>';
		return html;
	}
	
	/* 
	*  @function formValdation
	*  @return Validate forms style
	*/
	thisClass.formValidation = function(selector, errors){
		$(selector).find('input').each(function( index ) {
			$(this).removeClass("is-valid is-invalid");
			if (typeof errors[$(this).attr('name')] !== 'undefined') {
				$(this).addClass('is-invalid');
				$(this).parent().find('.invalid-feedback').html(errors[$(this).attr('name')][0]);
			}
		});
	}

	$('input').keyup(function(){
		$(this).removeClass("is-valid is-invalid");
		$(this).parent().find('.valid-feedback,.invalid-feedback').html('');
		$('body').find('.form-alert div').hide("slow", function() {
				    $(this).remove();
				  });
	});
	$('input').change(function(){
		$(this).removeClass("is-valid is-invalid");
		$(this).parent().find('.valid-feedback,.invalid-feedback').html('');
		$('body').find('.form-alert div').hide("slow", function() {
				    $(this).remove();
				  });
	});
	return thisClass;
})();