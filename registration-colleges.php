<?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/html-loader.layout.php' ?>

<?php startblock('title') ?>colleges registraion form<?php endblock() ?>



<?php startblock('topposition') ?>
	<?php superblock() ?>
<?php endblock() ?>

<?php startblock('header') ?>
	<?php superblock() ?>


	<?php //INCLUDE FORM MANAGER ?>
    <script>var controllersPath = '<?php echo $_SESSION['address']."controllers/"; ?>';</script>
	<script src="<?php echo $_SESSION['address'];?>res/js/autoform.js" type="text/javascript"></script>    
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/class.form.php"; ?>
<?php endblock() ?>    

<?php startblock('body') ?>



	<?php 
		$colleges = "";
		$f = new Cform();
			$colleges .= $f->formstart(['id'=>'formRegistrationcolleges', 'label'=>'<h3>საგანმანათლებლო დაწესებულების სარეგისტრაციო ფორმა</h3>', 'table'=>'tb_students', 'success'=>'თქვენ წარმატებით გაიარეთ რეგისტრაცია', 'error'=>'შეცდომა რეგისტრაციისას, გთხოვთ, გაანახლოთ გვერდი', 'entry'=>-1]);

			$colleges .= $f->elem(['id'=>'inputTyp', 'type'=>'hidden', 'value'=>3, 'col'=>'typ' ]);

			$colleges .= $f->elem(['id'=>'inputCompany', 'label'=>'საგანმანათლებლო დაწესებულების დასახელება', 'placeholder'=>'შეიყვანეთ საგანმანათლებლო დაწესებულების დასახელება', 'required'=>true, 'geo'=>true, 'col'=>'company']);	
			
			$colleges .= $f->elem(['id'=>'inputCollegetype', 'label'=>'საგანმანათლებლო დაწესებულების იურიდიული ფორმა', 'placeholder'=>'აირჩიეთ აგანმანათლებლო დაწესებულების იურიდიული ფორმა', 'type'=>'select', 'required'=>true, 'data'=>['table'=>'tb_collegetype', 'id'=>'id', 'value'=>'collegetype', 'sort'=>'id'], 'col'=>'collegetype' ]);	

			$colleges .= $f->elem(['id'=>'inputCollegeform', 'label'=>'საგანმანათლებლო დაწესებულების ტიპი', 'placeholder'=>'აირჩიეთ საგანმანათლებლო დაწესებულების ტიპი', 'type'=>'select', 'required'=>true, 'data'=>['table'=>'tb_collegeform', 'id'=>'id', 'value'=>'collegeform', 'sort'=>'id'], 'col'=>'collegeform' ]);

			//$colleges .= $f->elem(['id'=>'inputEntityType', 'label'=>'სამართლებრივი ფორმა', 'placeholder'=>'შეიყვანეთ სამართლებრივი ფორმა', 'type'=>'select', 'required'=>true, 'data'=>['table'=>'tb_entitytype', 'id'=>'id', 'value'=>'cap'], 'col'=>'entitytype_id' ]);
			
			$colleges .= $f->elem(['id'=>'inputIdentity', 'label'=>'საიდენტიფიკაციო ნომერი', 'placeholder'=>'შეიყვანეთ საიდენტიფიკაციო ნომერი', 'required'=>true, 'unique'=>['table'=>'tb_students', 'column'=>'piradinomeri'], 'minlength'=>9, 'numeric'=>true, 'col'=>'piradinomeri']);
			

			//$colleges .= $f->datepicker(['id'=>'inputRegDate', 'label'=>'რეგისტრაციის თარიღი', 'placeholder'=>'შეიყვანეთ რეგისტრაციის თარიღი', 'required'=>true, 'col'=>'regdate']);	
			
			
			
			$colleges .= "<h4>საკონტაქტო ინფორმაცია</h4>";
			$colleges .= $f->elem(['id'=>'selectState',	'type'=>'select', 'data'=>['table'=>'tb_state', 'id'=>'id', 'value'=>'name'], 'label'=>'რეგიონი', 'placeholder'=>'აირჩიეთ რეგიონი', 'required'=>true, 'child'=>'selectCity', 'col'=>'state_id']);
							
			$colleges .= $f->elem(['id'=>'selectCity', 'type'=>'select', 'data'=>['table'=>'tb_city', 'id'=>'id', 'value'=>'name', 'parent'=>'state_id'], 'label'=>'მუნიციპალიტეტი', 'placeholder'=>'აირჩიეთ მუნიციპალიტეტი', 'required'=>true, 'col'=>'city_id']);

			$colleges .= $f->elem(['id'=>'inputMisamarti2', 'label'=>'იურიდიული მისამართი', 'placeholder'=>'შეიყვანეთ იურიდიული მისამართი', 'required'=>true, 'geo'=>true, 'col'=>'address2']);
			$colleges .= $f->elem(['id'=>'inputSafosto2', 'label'=>'საფოსტო ინდექსი (იურიდიული მის.)', 'placeholder'=>'შეიყვანეთ საფოსტო ინდექსი', 'required'=>true, 'numeric'=>true, 'col'=>'post_code2']);

			$colleges .= $f->elem(['id'=>'inputMisamarti', 'label'=>'ფაქტიური მისამართი', 'placeholder'=>'შეიყვანეთ ფაქტიური მისამართი', 'required'=>true, 'geo'=>true, 'col'=>'address']);
			$colleges .= $f->elem(['id'=>'inputSafosto', 'label'=>'საფოსტო ინდექსი (ფაქტიური მის.)', 'placeholder'=>'შეიყვანეთ საფოსტო ინდექსი', 'required'=>true, 'numeric'=>true, 'col'=>'post_code']);

			$colleges .= $f->elem(['id'=>'inputMobiluri', 'label'=>'მობილური ტელეფონი <mark>(5xx xxx xxx)</mark>', 'placeholder'=>'შეიყვანეთ მობილური ტელეფონი', 'required'=>true, 'numeric'=>true, 'maxlength'=>9, 'col'=>'mob']);	
			$colleges .= $f->elem(['id'=>'inputFixed', 'label'=>'ფიქსირებული ქსელი <mark>(032 2 xx xx xx)</mark>', 'placeholder'=>'შეიყვანეთ ფიქსირებული ქსელი', 'numeric'=>true, 'maxlength'=>10, 'col'=>'tel']);	
			$colleges .= $f->elem(['id'=>'inputWebpage', 'label'=>'ვებ-გვერდი', 'placeholder'=>'შეიყვანეთ ვებ-გვერდი', 'required'=>false, 'col'=>'webpage']);	
			$colleges .= $f->elem(['id'=>'inputFosta', 'label'=>'ელექტრონული ფოსტა', 'placeholder'=>'შეიყვანეთ ელექტრონული ფოსტა', 'type'=>'mail', 'required'=>true, 'unique'=>['table'=>'tb_students', 'column'=>'mail'], 'col'=>'mail']);
			
			$colleges .= $f->elem(['id'=>'inputFB', 'label'=>'Facebook პროფილის მისამართი', 'placeholder'=>'შეიყვანეთ Facebook პროფილის მისამართი', 'col'=>'fb']);

			$colleges .= $f->elem(['id'=>'inputParoli1', 'label'=>'პაროლი', 'placeholder'=>'შეიყვანეთ პაროლი', 'type'=>'password', 'required'=>true, 'col'=>'pass']);
			$colleges .= $f->elem(['id'=>'inputParoli2', 'label'=>'პაროლი ხელმეორედ', 'placeholder'=>'შეიყვანეთ პაროლი ხელმეორედ', 'type'=>'password', 'required'=>true]);

			

			$colleges .= $f->elem(['id'=>'inputContactPerson', 'label'=>'საკონტაქტო პირი', 'placeholder'=>'შეიყვანეთ საკონტაქტო პირი', 'required'=>true, 'geo'=>true, 'col'=>'contact_person']);	
			$colleges .= $f->elem(['id'=>'inputLeader', 'label'=>'ხელმძღვანელი', 'placeholder'=>'შეიყვანეთ ხელმძღვანელი', 'required'=>true, 'geo'=>true, 'col'=>'leader']);	
			
			$colleges .= $f->elem(['id'=>'selcollegestatus', 'geo'=>true, 'label'=>'სტატუსი', 'placeholder'=>'აირჩიეთ სტატუსი', 'type'=>'select', 'chosen'=>1,'data'=>['table'=>'tb_collegestatus', 'id'=>'collegestatus', 'value'=>'collegestatus'], 'col'=>'collegestatusеs' ]);

			$colleges .= "<h4>დამატებითი ინფორმაცია საგანმანათლებლო დაწესებულების შესახებ:</h4>";	
			

						
			$colleges .= $f->elem(['id'=>'inputComment', 'label'=>'დამატებითი ინფორმაცია დაწესებულების შესახებ', 'placeholder'=>'დამატებითი ინფორმაცია დაწესებულების შესახებ', 'type'=>'textarea', 'maxlength'=>250, 'geo'=>true, 'allownewline'=>false, 'col'=>'motivation']);

			$colleges .= $f->elem(['id'=>'inputEmisisProgramebi', 'label'=>'EMIS-ის პროგრამები', 'placeholder'=>'აირჩიეთ EMIS-ის პროგრამა', 'type'=>'select', 'required'=>true, 'data'=>['table'=>'tb_emisis_programebi', 'id'=>'id', 'value'=>'emis_program', 'sort'=>'id'], 'col'=>'emis_program_id' ]);	
			
			$colleges .= $f->elem(['id'=>'inputSakontaktoPiri', 'label'=>'საკონტაქტო პირი', 'placeholder'=>'შეიყვანეთ საკონტაქტო პირი', 'required'=>true, 'geo'=>true, 'col'=>'sakontakto_piri']);
			$colleges .= $f->elem(['id'=>'inputInstruktor', 'label'=>'ხელმძღვანელი', 'placeholder'=>'შეიყვანეთ ხელმძღვანელი', 'required'=>true, 'geo'=>true, 'col'=>'instruktor']);
			
			$colleges .= $f->elem(['id'=>'inputCollegeStatus', 'label'=>'საგ. დაწესებულების სტატუსი', 'placeholder'=>'აირჩიეთ საგ. დაწესებულების სტატუსი', 'type'=>'select', 'required'=>true, 'data'=>['table'=>'tb_college_status', 'id'=>'id', 'value'=>'college_status', 'sort'=>'id'], 'col'=>'college_status_id' ]);	
			$colleges .= $f->elem(['id'=>'inputMomzadebis', 'label'=>'მომზადებისა და გადამზადების პროგრამის დასახელება', 'placeholder'=>'შეიყვანეთ როგრამის დასახელება', 'geo'=>true, 'col'=>'momzadebis_programa']);
			
			$colleges .= $f->elem(['id'=>'inputAgree1', 'label'=>'თანახმა ვარ ჩემი ინფორმაცია გასაჯაროვდეს საქართველოს ფერმერთა ასოციაციის მიერ', 'type'=>'checkbox', 'required'=>true]);
			$colleges .= $f->elem(['id'=>'inputAgree2', 'label'=>'თანახმა ვარ მივიღო შეტყობინება საქართელოს ფერმერთა ასოციაციის მიერ', 'type'=>'checkbox', 'required'=>true]);


			$colleges .= $f->button('buttonRegistracia','რეგისტრაცია', 'right');
		$colleges .= $f->formend();


		echo $colleges;
	?>

<?php endblock() ?>