{include file="header.tpl" title=header}
{include file="navigation.tpl" title=navigation}


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
									{foreach from=$forms item=form}
										<tr>
										  <td>{$form.formName}</td>
										  <td>{$form.formId}</td>
										  <td>{$form.formClass}</td>
										  <td>{$form.formAction}</td>
										  <td>{$form.formMethod}</td>
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
									{/foreach}
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



{include file="footer.tpl" title=footer}