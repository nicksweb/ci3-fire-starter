<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3 class="panel-title"><?php echo lang('finance title finance_list'); ?></h3>            
            </div>
            <div class="col-md-6 text-right">

                <a href="<?php echo $this_url; ?>" class="btn btn-danger tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter_reset'); ?>"><span class="glyphicon glyphicon-refresh"></span> <?php echo lang('core button reset'); ?></a>
			
				<a href="<?php echo $this_url; ?>?sort=id&dir=desc&limit=25&offset=0&category=110" class="btn btn-info tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter_reset'); ?>"><span class="glyphicon glyphicon-refresh"></span> Incoming</a>
				
				<a class="btn btn-success tooltips" href="<?php echo base_url('admin/finance/add'); ?>" title="<?php echo lang('finance tooltip add_new_record') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('finance button add_new_record'); ?></a>
				
            </div>
        </div>
    </div>
    
                    <?php echo form_open("{$this_url}?sort={$sort}&dir={$dir}&limit={$limit}&offset=0{$filter}", array('role'=>'form', 'id'=>"filters")); ?>


    <table class="table table-striped table-hover-warning">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col finance_id'); ?></a>
                    <?php if ($sort == 'id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=title&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col title'); ?></a>
                    <?php if ($sort == 'title') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=category&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col category'); ?></a>
                    <?php if ($sort == 'category') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=description&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col description'); ?></a>
                    <?php if ($sort == 'description') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=value&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col value'); ?></a>
                    <?php if ($sort == 'value') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=assigned_user&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('finance col who'); ?></a>
                    <?php if ($sort == 'assigned_user') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td class="pull-right">
                    <?php echo lang('admin col actions'); ?>
                </td>
            </tr>

            <?php // search filters ?>
            <tr>
                    <th>
                    </th>
                    <th<?php echo ((isset($filters['title'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'title', 'id'=>'title', 'class'=>'form-control input-sm', 'placeholder'=>lang('finance input title'), 'value'=>set_value('title', ((isset($filters['title'])) ? $filters['title'] : '')))); ?>
                    </th>
                    <th<?php echo ((isset($filters['category'])) ? ' class="has-success"' : ''); ?>>
						
						

                        
                    
						<?php if(isset($category_list)) { ?>
					<select name="category" id="category-list-dropdown" class="form-control selectpicker" data-live-search="true" data-placeholder="Choose a Category...">
<?php 
		
		echo '<option value="" data-tokens="">None</option>';

foreach($category_list as $row) { ?>

<option <?php if($this->input->get('category')==$row->id){echo "selected='selected' "; }?> value="<?=$row->id?>" data-tokens="<?=$row->categories?>"><?=$row->categories?></option>
						<?php }} ?>
</select>

<?php 						
						// echo form_dropdown('category', $category_list, $this->input->get('category'),'id="category-list-dropdown" class="form-control chosen-select" data-placeholder="Choose a Category..."');
						
						?>
						
						
                    </th>
                    <th<?php echo ((isset($filters['description'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'description', 'id'=>'title', 'class'=>'form-control input-sm', 'placeholder'=>lang('finance input description'), 'value'=>set_value('description', ((isset($filters['description'])) ? $filters['description'] : '')))); ?>
                    </th>
					<th></th>
					<th>
                    <?php if(isset($username_list)) { ?>
					<select name="assigned_user" id="username-list-dropdown" class="form-control selectpicker" data-live-search="true"  data-placeholder="Choose a Name...">
                    <?php 
		
		echo '<option value="" data-tokens="None">None</option>';

foreach($username_list as $row) { ?>

<option <?php if($this->input->get('assigned_user')==$row->id){echo "selected='selected' "; }?> value="<?=$row->id?>" data-tokens="<?=ucfirst($row->username)?>"><?=ucfirst($row->username)?></option>
						<?php }} ?>
</select>
					</th>
					
                    <th>
                        <div class="text-right">
						
                            <button type="submit" name="submit" value="<?php echo lang('core button filter'); ?>" class="btn btn-success tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter'); ?>"><span class="glyphicon glyphicon-filter"></span> <?php echo lang('core button filter'); ?></button>
                        </div>
                    </th>
					
					
                
            </tr>

        </thead>
        <tbody>

            <?php // data rows ?>
            <?php if ($total) : ?>
                <?php foreach ($finances as $finance) : ?>
                    <tr>
                        <td<?php echo (($sort == 'id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $finance['id']; ?>
                        </td>
                        <td<?php echo (($sort == 'title') ? ' class="sorted"' : ''); ?>>
                            <?php echo $finance['title']; ?>
                        </td>
                        <td<?php echo (($sort == 'category') ? ' class="sorted"' : ''); ?>>
                            <?php 
							echo $category_name[$finance['category']]; ?>
                        </td>
                        <td<?php echo (($sort == 'description') ? ' class="sorted"' : ''); ?>>
                            <?php echo $finance['description']; ?>
                        </td>
                        <td<?php echo (($sort == 'value') ? ' class="sorted"' : ''); ?>>
                            
							<?php if ($finance['value'] > 0): ?>

							<?php echo '<span class="active">$' . $finance['value'] . '</span>'; ?>

							<?php else: ?>

							<?php echo '<span class="inactive">$' . $finance['value'] . '</span>'; ?>
 
							<?php endif; ?>
							
                        </td>
                        <td<?php echo (($sort == 'assigned_user') ? ' class="sorted"' : ''); ?>>
						<?php 
							$x = $finance['assigned_user'];
							if (isset($user_list[$x])==1) {
                                echo $user_list[$x];
                            } else {
                                echo "No User Assigned"; 
                            }
						?>
                        </td>
                        <td>
                            <div class="text-right"style="width: 80px">
                                <div class="btn-group">
                                    <?php if ($finance['id'] > 1) : ?>
                                        <a href="#modal-<?php echo $finance['id']; ?>" data-toggle="modal" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    <?php endif; ?>
                                    <a href="<?php echo $this_url; ?>/edit/<?php echo $finance['id']; ?>" class="btn btn-warning" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">
                        <?php echo lang('core error no_results'); ?>
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
    <?php echo form_close(); ?>
    
    <?php // list tools ?>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-2 text-left">
                <label><?php echo sprintf(lang('admin label rows'), $total); ?></label>
            </div>
            <div class="col-md-2 text-left">
                <?php if ($total > 10) : ?>
                    <select id="limit" class="form-control">
                        <option value="10"<?php echo ($limit == 10 OR ($limit != 10 && $limit != 25 && $limit != 50 && $limit != 75 && $limit != 100)) ? ' selected' : ''; ?>>10 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="25"<?php echo ($limit == 25) ? ' selected' : ''; ?>>25 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="50"<?php echo ($limit == 50) ? ' selected' : ''; ?>>50 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="75"<?php echo ($limit == 75) ? ' selected' : ''; ?>>75 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="100"<?php echo ($limit == 100) ? ' selected' : ''; ?>>100 <?php echo lang('admin input items_per_page'); ?></option>
                    </select>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo $pagination; ?>
            </div>
            <div class="col-md-2 text-right">
                <?php if ($total) : ?>
                    <a href="<?php echo $this_url; ?>/export?sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?><?php echo $filter; ?>" class="btn btn-success tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip csv_export'); ?>"><span class="glyphicon glyphicon-export"></span> <?php echo lang('admin button csv_export'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<?php // delete modal ?>
<?php if ($total) : ?>
    <?php foreach ($finances as $finance) : ?>
        <div class="modal fade" id="modal-<?php echo $finance['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $finance['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $finance['id']; ?>"><?php echo lang('finance title finance_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('finance msg delete_confirm'), $category_name[$finance['category']] . " - " . $finance['description']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<button type="button" class="btn btn-primary btn-delete-record" data-id="<?php echo $finance['id']; ?>"><?php echo lang('admin button delete'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>