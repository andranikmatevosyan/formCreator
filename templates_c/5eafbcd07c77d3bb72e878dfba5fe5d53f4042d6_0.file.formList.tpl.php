<?php
/* Smarty version 3.1.32-dev-31, created on 2018-02-04 11:53:41
  from "C:\OpenServer\domains\formBuild\templates\formList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-31',
  'unifunc' => 'content_5a76bc052e7860_42340060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eafbcd07c77d3bb72e878dfba5fe5d53f4042d6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\formBuild\\templates\\formList.tpl',
      1 => 1517730818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navigation.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5a76bc052e7860_42340060 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'header'), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'navigation'), 0, false);
?>



<div class="content-wrapper">
    <div class="app-content content container-fluid">
      	<div class="content-wrapper">
			<div class="content-body">
				<div class="row">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title" id="basic-layout-round-controls">Forms List</h4>
							<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<li><a data-action="collapse"><i class="fa fa-minus"></i></a></li>
									<li><a data-action="reload"><i class="fas fa-sync-alt"></i></a></li>
									<li><a data-action="expand"><i class="fa fa-expand"></i></a></li>
									<li><a data-action="close"><i class="fa fa-times"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-body collapse in">
							<div class="card-block">
								<table id="datatable-responsive" class="table table-striped table-bordered datatable-button nowrap" cellspacing="0" width="100%">
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Id</th>
										  <th>Class</th>
										  <th>Action</th>
										  <th>Method</th>
										  <th>View</th>
										  <th>Edit</th>
										  <th>Delete</th>
										</tr>
									  </thead>
									  <tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['forms']->value, 'form');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['form']->value) {
?>
										<tr>
										  <td><?php echo $_smarty_tpl->tpl_vars['form']->value['formName'];?>
</td>
										  <td><?php echo $_smarty_tpl->tpl_vars['form']->value['formId'];?>
</td>
										  <td><?php echo $_smarty_tpl->tpl_vars['form']->value['formClass'];?>
</td>
										  <td><?php echo $_smarty_tpl->tpl_vars['form']->value['formAction'];?>
</td>
										  <td><?php echo $_smarty_tpl->tpl_vars['form']->value['formMethod'];?>
</td>
										  <td class="text-center">
											  <a href="#" >
											  	<i class="fas fa-info-circle"></i> View
											  </a>	  
										  </td>
										  <td class="text-center">
											  <a href="#" >
											  	<i class="far fa-edit"></i> Edit
											  </a>  
										  </td>
										  <td class="text-center">
											  <a href="#" >
												  <i class="fas fa-trash-alt"></i> Delete
											  </a>
										  </td>
										</tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</tbody>
								</table>
								<div class="clearfix"></div>
								<div class="pull-right">
									<a href="newForm.php" class="btn btn-link">New Form</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      </div>
    </div>
</div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'footer'), 0, false);
}
}
