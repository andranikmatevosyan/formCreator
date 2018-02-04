<?php
require_once '../init.php';

if(isset($_POST['general'])) {
	$formJson = $_POST['data'];
	$formData = json_decode($formJson, true);
	$formGeneral = $_POST['general'];
	$formGeneralExp = explode("&", $formGeneral);

	foreach($formGeneralExp as $formExp) {
		$formExpArray = explode("=", $formExp);
		$formValues[$formExpArray[0]] = $formExpArray[1];
	}
	
	$formName = $formValues['form-name'];
	$formId = $formValues['form-id'];
	$formClass = $formValues['form-class'];
	$formAction = $formValues['form-action'];
	$formMethod = $formValues['form-method'];
	
	
	$formGeneral = query("INSERT INTO form_general(formName, formId, formClass, formAction, formMethod, formJson) VALUES ('$formName', '$formId', '$formClass', '$formAction', '$formMethod', '$formJson')");

	if ($formGeneral == 1) {
		$lastForm = getOneDB("SELECT * FROM form_general ORDER BY id DESC LIMIT 1");
		$lastFormId = $lastForm['id'];
		
		foreach($formData as $data) {
			$type = '';
			$subtype = '';
			$name = '';
			$class = '';
			$label = '';
			$value = '';
			$placeholder = '';
			$help = '';
			$required = 0;
			$rows = '';
			$min = '';
			$max = '';
			$step = '';
			$inline = 0;
			$multiple = 0;
			$toggle = 0;
			$style = '';
				
			if (array_key_exists('type', $data)) {
				$type = $data['type'];
			}
			
			if (array_key_exists('subtype', $data)) {
				$subtype = $data['subtype'];
			}
			
			if (array_key_exists('name', $data)) {
				$name = $data['name'];
			}
			
			if (array_key_exists('className', $data)) {
				$class = $data['className'];
			}
			
			if (array_key_exists('label', $data)) {
				$label = $data['label'];
			}
			
			if (array_key_exists('value', $data)) {
				$value = $data['value'];
			}
			
			if (array_key_exists('placeholder', $data)) {
				$placeholder = $data['placeholder'];
			}
			
			if (array_key_exists('description', $data)) {
				$help = $data['description'];
			}
			
			if (array_key_exists('required', $data)) {
				$required = $data['required'];
			}
			
			if (array_key_exists('rows', $data)) {
				$rows = $data['rows'];
			}
			
			if (array_key_exists('min', $data)) {
				$min = $data['min'];
			}
			
			if (array_key_exists('max', $data)) {
				$max = $data['max'];
			}
			
			if (array_key_exists('step', $data)) {
				$step = $data['step'];
			}
			
			if (array_key_exists('inline', $data)) {
				$inline = $data['inline'];
			}
			
			if (array_key_exists('multiple', $data)) {
				$multiple = $data['multiple'];
			}
			
			if (array_key_exists('toggle', $data)) {
				$toggle = $data['toggle'];
			}
			
			if (array_key_exists('style', $data)) {
				$style = $data['style'];
			}
			
			$formFields = query("INSERT INTO form_fields(formId, type, subtype, name, class, label, value, placeholder, help, required, rows, min, max, step, inline, multiple, toggle, style) VALUES ('$lastFormId', '$type', '$subtype', '$name', '$class', '$label', '$value', '$placeholder', '$help', '$required', '$rows', '$min', '$max', '$step', '$inline', '$multiple', '$toggle', '$style')");
			
			if($formFields == 1) {
				$formInsert = true;
				
				if (array_key_exists('values', $data)) {
					$dataValues = $data['values'];
					$lastField = getOneDB("SELECT * FROM form_fields ORDER BY id DESC LIMIT 1");
					$lastFieldId = $lastField['id'];
					
					foreach($dataValues as $values) {
						$optLabel = '';
						$optValue = '';
						$optSelected = 0;
							
						if (array_key_exists('label', $values)) {
							$optLabel = $values['label'];
						}
						if (array_key_exists('value', $values)) {
							$optValue = $values['value'];
						}
						if (array_key_exists('selected', $values)) {
							$optSelected = $values['selected'];
						}
						
						$formOptions = query("INSERT INTO form_options(fieldId, label, value, selected) VALUES ('$lastFieldId', '$optLabel', '$optValue', '$optSelected')");
						
						if($formOptions == 1) {
							$formInsert = true;
						} else {
							echo 'Something is wrong with form options';
							exit;
						}
					}
				}
			} else {
				echo 'Something is wrong with form fields';
				exit;
			}
		}
	} else {
		echo 'Something is wrong with form general info';
		exit;
	}
	
	if($formInsert == true) {
		echo 'inserted';
	}
}
?>
