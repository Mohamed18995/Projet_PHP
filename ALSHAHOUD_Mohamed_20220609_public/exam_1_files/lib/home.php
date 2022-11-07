<?php 
function getOneArticle($id){
    if(!is_number($id)){
       return null;
   }

   $sql = 'SELECT ad.ad_id As id, ad.ad_title AS title, ad.ad_description As descrption , ad.ad_description_detail As description_detail , level_2 , level_1 FROM ad AS ad INNER JOIN category_level_2 AS level_2
   ON  ad.category_level_2_id = level_2.category_level_2_id INNER JOIN category_level_1 AS level_1 ON level_1.category_level_1_id = level_2.category_level_1_id WHERE ad.ad_id = '.$id.' AND ad.is_visible = "1" ';
   return requeteResultat($sql);
}


function getArticles($every_page , $place) {
  
    $sql = 'SELECT a.ad_id as id , a.ad_title , concat(d.firstname," ",d.lastname) as designer_fullname ,m.manufacturer , a.ad_description , a.price FROM ad a INNER JOIN designer d
    ON a.designer_id = d.designer_id INNER JOIN manufacturer m ON m.manufacturer_id = a.manufacturer_id WHERE a.is_visible = "1" ORDER BY a.ad_title limit '.$place.','.$every_page.'';
    return requeteResultat($sql);
}

//calcul de quantité totale quand is visible = 1 
function getTotalArticles(){
    $sql = "SELECT count(*) AS total FROM ad WHERE is_visible = '1'";

    $result= requeteResultat($sql);
    return $result[0]['total'];
};


?>