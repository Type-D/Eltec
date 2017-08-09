<?php 
/* Template Name: Page Contactez-Nous */ 
get_header(); 
?>
<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<!-- Map Section -->
			<div class="map" id="GoogleMap"></div>
			<div class="discription">
				<!-- End Map section -->
				<div id="nousJoindre" class="midContent">
					<?php /* insererContenuePageAvecTitre("nous-joindre"); */ ?>
					<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12">
						<?php if (have_posts()): while (have_posts()) : the_post();
							echo "<h2 class='redText'>";
							the_title();
							echo "</h2>";
							the_content('Lire la suite');
						endwhile; ?>            
						<?php endif; ?>            
						<?php //get_sidebar(); ?>        
					</div>
					<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">
						<form name='frmContact' id='frmContact' action="../wp-content/themes/dist-child/modules/nous_joindre_post.php">
						<input type="hidden" name="vide" id="vide" value=""/>
						<input type='text' id='txtNom' placeholder="<?php _e( 'Votre_nom', 'html5blankchild' ); ?>" />
						<input type='text' id='txtPhone' placeholder="<?php _e( 'Votre_telephone', 'html5blankchild' ); ?>" />
						<input type='text' id='txtEmail' placeholder="<?php _e( 'Votre_email', 'html5blankchild' ); ?>" />
						<textarea id='taMessage' placeholder="<?php _e( 'Votre_message', 'html5blankchild' ); ?>"></textarea>
						<input type='button' value="<?php _e( 'Envoyer', 'html5blankchild' ); ?>" id="Envoyer" />
						</form>
						
						<div id="divContactConfirm" class="cstMsg">
						<?php _e( 'Felicitations', 'html5blankchild' ); ?><br/><br/>
						<?php _e( 'Demande_traitee', 'html5blankchild' ); ?><br/><br/>
						<?php _e( 'Merci_email', 'html5blankchild' ); ?>
						</div>
						<div id="divFieldsError" class="cstMsg"></div>
						<div id="divContactProblem" class="cstMsg">
						<?php _e( 'Probleme_envoi', 'html5blankchild' ); ?>
						</div>						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>-child/js/initMap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApYXy82zpvABeySb72bftp4iOBOGEgXIc&callback=initMap" async defer></script>
<script type="text/javascript">
	$("form#frmContact>#Envoyer").click(function(){ 
		var emptyFields = false;
		var errMessage = new Array();
	
		$("div.cstMsg").hide();
		//Robot validation
		if($("input[type=hidden]#vide").val().toString().trim() !== "") return false;	
		//Empty fields validation
		if($("input[type=text]#txtNom").val().toString().trim() === "") {
			$("input[type=text]#txtNom.form-control").css("border-bottom","1px solid #f00");
			errMessage.push("<?php _e( 'Nom_obligatoire', 'html5blankchild' ); ?>");
			emptyFields = true;
		}
		if($("input[type=text]#txtPhone").val().toString().trim() === "") {
			$("input[type=text]#txtPhone.form-control").css("border-bottom","1px solid #f00");
			errMessage.push("<?php _e( 'Tel_obligatoire', 'html5blankchild' ); ?>");
			emptyFields = true;
		}		
		if($("input[type=text]#txtEmail").val().toString().trim() === "" || !isValidEmailAddress($("input[type=text]#txtEmail").val().toString().trim())){
			$("input[type=text]#txtEmail.form-control").css("border-bottom","1px solid #f00");
			errMessage.push("<?php _e( 'Email_obligatoire', 'html5blankchild' ); ?>");
			emptyFields = true;
		}
		if(emptyFields){
			$("div#divFieldsError").html(errMessage.join("<br/>")).show();
			window.setTimeout(function(){ $("div#divFieldsError").hide(); }, 5000);				
			return false;
		}
		var dbContact = {"nom":$("input[type=text]#txtNom").val().toString().replace(/"/g,"\\\""),
						 "phone":$("input[type=text]#txtPhone").val().toString().replace(/"/g,"\\\""),
						 "email":$("input[type=text]#txtEmail").val().toString().replace(/"/g,"\\\""),
						 "message":$("textarea#taMessage").val().toString().replace(/"/g,"\\\"")}; 

		$.ajax({ url: $(this).parents("form").attr("action"), data: JSON.stringify(dbContact),type: 'post'}).done(function(result){ 
			$("div.cstMsg").hide();
			if (result.toString().trim() == "") {
				$("form#frmContact")[0].reset();
				$("div#divContactConfirm").show();
				window.setTimeout(function(){ $("div#divContactConfirm").hide(); }, 5000);					
			} else {
				$("div#divContactProblem").show();
				window.setTimeout(function(){ $("div#divContactProblem").hide(); }, 5000);
			}
		});
		return false;
	});
	
	function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	}
</script>
<?php get_footer(); ?>