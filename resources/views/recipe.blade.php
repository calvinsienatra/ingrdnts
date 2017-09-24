<h1>Recipes</h1>
<?php 
if(!empty($recipes_array)){
	foreach($final_recipes as $row){
		echo $row->food_name;
	}
}else{
	echo "Sorry there isn't any matching recipes for this ingredients!";
}

?>