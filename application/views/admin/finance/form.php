<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form','enctype'=>'multipart/form-data')); //  ?>

    <?php // hidden id ?>
    <?php if (isset($finance['id'])) : ?>
        <?php echo form_hidden('id', $finance['id']); ?>
    <?php endif; ?>
    <div class="row">
        <?php // title ?>
        <div class="form-group col-sm-4<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input title'), 'title', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title', (isset($finance['title']) ? $finance['title'] : '')), 'class'=>'form-control')); ?>
        </div>
		
		 <div class="form-group col-sm-4">
            <br />
			<?php 
			
			if (isset($user_id)) {
			
			echo form_label("Search this Record at GMail", 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
             			 
			<?php 

				echo "<br /><a target='_blank' href='https://mail.google.com/mail/u/0/#search/R". $user_id . "'>0 - Search in GMail</a>";
				echo "<a style='margin-left: 30px;' target='_blank' href='https://mail.google.com/mail/u/1/#search/R". $user_id . "'>1 - Search in GMail</a>";
			}
			?> 
			 
        </div>
		
    </div>

    <div class="row">
	
	</div>
  
    <div class="row">
        <?php // description ?>
        <div class="form-group col-sm-4<?php echo form_error('description') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input description'), 'description', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'description', 'value'=>set_value('description', (isset($finance['description']) ? $finance['description'] : '')), 'class'=>'form-control')); ?>
			
			</div>
			
			  <?php // value ?>
        <div class="form-group col-sm-4<?php echo form_error('costprice') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input costprice'), 'value', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'costprice', 'value'=>set_value('title', (isset($finance['value']) ? $finance['value'] : '')), 'class'=>'form-control'));  ?>
        </div>
			
        </div>
		
	 <div class="row">
     	
        <?php // filename ?>
        <div class="form-group col-sm-4<?php echo form_error('filename') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input filename'), 'filename', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <input type="file" name="userfile" />
			 <?php echo form_hidden(array('name'=>'hiddenFile', 'value'=>set_value('value', (isset($finance['filename']) ? $finance['filename'] : '')), 'class'=>'form-control')); ?>
        </div>
<?php if (isset($delete_after_upload)) { 
 if ($delete_after_upload == 0 and is_file("./uploads/".$finance['filename']) ) { ?>
		<div class="form-group col-sm-10">
		
		<strong>Open current record</strong> - <a href="<?php echo base_url('/admin/finance/efsdownload/'.$finance['id']); ?>">Download</a>
		</div>

<?php } } ?>
    </div>
	
 <div class="row">
      
</div>

 <!--   <div class="row">
        <?php // language ?>
        <div class="form-group col-sm-6<?php echo form_error('language') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input language'), 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_dropdown('language', $this->languages, (isset($finance['language']) ? $finance['language'] : $this->config->item('language')), 'id="language" class="form-control"'); ?>
        </div>
    </div>  -->
	
	 <div class="row">
      
</div>
	
	 <div class="row">
        <?php // category ?>
        <div class="form-group col-sm-4<?php echo form_error('category') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input category_new'), 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
             
			<?php 
			$js = 'class="dropdown-menu" role="menu" aria-labelledby="session-language"';
			
			// $sl_val = $this->input->post($category_id);

			
			echo form_dropdown('category_id', $category_list, (isset($finance['category'])) ? $finance['category'] : '','id="category-list-dropdown" class="form-control selectpicker" data-live-search="true" data-placeholder="Choose a Category..."');
			?> 
			 
        </div>
		
		 <?php // Vendor / Supplier ?>
        <div class="form-group col-sm-4<?php echo form_error('vendor') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input vendor'), 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
             
			<?php 
			$js = 'class="dropdown-menu" role="menu" aria-labelledby="session-language"';
			
			// $sl_val = $this->input->post($category_id);

			
			echo form_dropdown('vendor_id', $vendor_list, (isset($finance['vendor'])) ? $finance['vendor'] : '','id="vendor-list-dropdown" id="category-list-dropdown" class="form-control selectpicker" data-live-search="true" data-placeholder="Choose a Category..."');
			?> 
			 
        </div>
		
    </div>
	
	 <div class="row">
       
	   <div class="form-group col-sm-4">
            <?php echo form_label(lang('finance input fy'), 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
             
			<?php 
			$js = 'class="dropdown-menu" role="menu" aria-labelledby="session-language"';
			
			// $sl_val = $this->input->post($category_id);

			
			echo form_dropdown('fiscal_y', $fiscal_list, (isset($finance['fiscal_yr'])) ? $finance['fiscal_yr'] : '','id="user-list-dropdown" id="category-list-dropdown" class="form-control selectpicker" data-live-search="true" data-placeholder="Choose a Category..."');
			?> 
			 
        </div>
	   
	   <div class="form-group col-sm-4<?php echo form_error('vendor') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('finance input who'), 'language', array('class'=>'control-label')); ?>
            <span class="required">*</span>
             
			<?php 
			$js = 'class="dropdown-menu" role="menu" aria-labelledby="session-language"';
			
			// $sl_val = $this->input->post($category_id);

			
			echo form_dropdown('username_id', $users_list, (isset($finance['assigned_user'])) ? $finance['assigned_user'] : '4','id="user-list-dropdown" id="category-list-dropdown" class="form-control selectpicker" data-live-search="true" data-placeholder="Choose a Category..."');
			?> 
			 
        </div>
		</div>
<?php if (isset($finance['title'])) { ?>	
		<div class="row">

        <!-- <div class="form-group col-sm-10">
<?php echo form_label("How to email in a record from your SmartPhone - Open the attachment in a new Email and copy/paste the following. Make required changes on this page, then click save and re-open the record.", 'language', array('class'=>'control-label')); ?><br />	

<?php echo form_label("To:", 'language', array('class'=>'control-label')); ?><br />
<input type="text" id="lookup" value='<?php echo $site_email_to->email; ?>' size="52" readonly />
<br /><br />
<?php echo form_label("CC:", 'language', array('class'=>'control-label')); ?><br />
<input type="text" id="lookup" value='<?php echo $site_email_cc; ?>' size="52" readonly />
<br /><br />
<?php echo form_label("Subject:", 'language', array('class'=>'control-label')); ?><br />
<input type="text" id="lookup" value='<?php echo $site_email_subject; ?>"' size="52" readonly />

		</div> --></div>
		
		
<?php } // buttons ?>
    <div class="row pull-right">
        <a class="btn btn-default" href="<?php echo $cancel_url; ?>"><?php echo lang('core button cancel'); ?></a>
        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <?php echo lang('core button save'); ?></button>
    </div>

<?php echo form_close(); ?>
