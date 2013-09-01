<?php

	class test_controller extends controller{
			
			function main()
			{	

				print_r($this->_router->getController()	);

				$model = new users_model();
				
				print $model->getusers();
				
			}


	}




 ?>