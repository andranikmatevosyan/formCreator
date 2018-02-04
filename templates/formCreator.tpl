{include file="header.tpl" title=header}
{include file="navigation.tpl" title=navigation}

<div class="content-wrapper">
    <div class="app-content content container-fluid">
      	<div class="content-wrapper">
			<div class="content-body">
				<div class="row">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title" id="basic-layout-round-controls">Form Creator</h4>
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
								<div id="error-form"></div>
	
								<form id="createForm" name="createForm" method="post">
									<fieldset>
										<legend>Form General Information:</legend>
										<div class="full-width flex">
											<div class="col-md-2">
												<div class="form-group">
													<label class="field-label" for="form-name">Name:</label>
													<input type="text" class="form-control" name="form-name" id="form-name" />
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="field-label" for="form-id">ID:</label>
													<input type="text" class="form-control" name="form-id" id="form-id" />
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="field-label" for="form-class">Class:</label>
													<input type="text" class="form-control" name="form-class" id="form-class" />
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="field-label" for="form-action">Action:</label>
													<input type="text" class="form-control" name="form-action" id="form-action" />
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="field-label" for="form-method">Method:</label>
													<select class="form-control" name="form-method" id="form-method">
														<option value="post">post</option>
														<option value="get">get</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="height1"></label>
													<button type="submit" name="btnCreateForm" id="btnCreateForm" class="btn btn-primary form-control">Save Form</button>
												</div>
											</div>
										</div>
									</fieldset>
								</form>

								<div class="height05"></div>

								<div id="stage1" class="build-wrap"></div>


								<form class="render-wrap"></form>
								<button id="edit-form">Edit Form</button>
								<div class="action-buttons">
								  <h2>Actions</h2>
								  <button id="showData" type="button">Show Data</button>
								  <button id="clearFields" type="button">Clear All Fields</button>
								  <button id="getData" type="button">Get Data</button>
								  <button id="getXML" type="button">Get XML Data</button>
								  <button id="getJSON" type="button">Get JSON Data</button>
								  <button id="getJS" type="button">Get JS Data</button>
								  <button id="setData" type="button">Set Data</button>
								  <button id="addField" type="button">Add Field</button>
								  <button id="removeField" type="button">Remove Field</button>
								  <button id="testSubmit" type="submit">Test Submit</button>
								  <button id="resetDemo" type="button">Reset Demo</button>
								  <h2>i18n</h2>
								  <select id="setLanguage">
									<option value="ar-TN" dir="rtl">تونسي</option>
									<option value="de-DE">Deutsch</option>
									<option value="en-US">English</option>
									<option value="es-ES">español</option>
									<option value="fa-IR" dir="rtl">فارسى</option>
									<option value="fr-FR">français</option>
									<option value="nb-NO">norsk</option>
									<option value="nl-NL">Nederlands</option>
									<option value="pt-BR">português</option>
									<option value="ro-RO">român</option>
									<option value="ru-RU">Русский язык</option>
									<option value="tr-TR">Türkçe</option>
									<option value="vi-VN">tiếng việt</option>
									<option value="zh-TW">台語</option>
								  </select>
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


