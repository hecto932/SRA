<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="row">
	<div class="col-md-12">
		<form id="form_autocomplete">
			<!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">-->
			<label>Usuario</label>
			<input id="usuario" name="usuario">	
		</form>
	</div>
</div>

  <script type="text/javascript" src="<?php echo base_url();?>	assets/back/js/mainApplication.js"></script>