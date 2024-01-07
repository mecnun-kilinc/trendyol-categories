<?php
 
 
class trendyol {
	 
	 
  public function Kategoriler() {

       
        $ch = curl_init("https://api.trendyol.com/sapigw/product-categories");


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
        $result = curl_exec($ch);
  
        $categories = json_decode($result, true);
 
        foreach ($categories['categories'] as $smcategoryId) {

            $this->getSubCategories($smcategoryId['name'], $smcategoryId['subCategories']);
        }
  
    
    }

    // Tek başına çağırılmaz.Önce Kategoriler() fonksiyonu çağırılır.
	
    public function getSubCategories($parentName, $subcats = array()) {

       

        foreach ($subcats as $subcat) {


            if ($subcat['subCategories']) {

                $this->getSubCategories($parentName . " > " . $subcat['name'], $subcat['subCategories']);
            
			} else {

               
				$CatName = '';
 
		   
		         echo $parentName . " > " . $subcat['name'];
				 
	 
                
                echo " <hr >";

            }

        }

 


    }



 } // class end
 
 $trendyol = new trendyol();


 $trendyol->Kategoriler();



 