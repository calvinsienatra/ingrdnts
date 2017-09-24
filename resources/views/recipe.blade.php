<h1>Recipes</h1><hr/>
<div class="container" style="padding=: 0; margin: 0; width: 100%;">
	<div class="row">
<?php 
if(!empty($recipes_array)){
	foreach($final_recipes as $row){
		?>


<a href="#" data-toggle="modal" data-target="#modal{{$row->food_id}}" style="margin: 0 auto; display: block; text-align: center;">
	<div class="column" class="food_pic" style="display: block; margin: 0 auto;">
		<h2>{{ $row->food_name }}</h2>
		<img class="food_pic" style="max-width: 100%;" src="{{ $row->picture_link }}"/>
	</div>
</a>

<div id="modal{{$row->food_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">{{$row->food_name}}</h2>
      </div>
      <div class="modal-body">
      	<img style="margin: 0 auto; display: block; max-width: 100%;" src="{{$row->picture_link}}"/>
        <h3>Ingredients</h3>
        <ul>
        	<?php
        		$new = [];
        		$a_array = $row->ingr_details;
        		//Decode array
            foreach (json_decode($a_array) as $value) 
            $new[] = $value;

            //Flatten array
            if (!is_array($new)) { 
                return FALSE; 
            } 
            $new_new = array(); 
            foreach ($new as $key => $value) { 
                if (is_array($value)) { 
                    $new_new = array_merge($new_new, array_flatten($value)); 
                } else { 
                    $new_new[$key] = $value; 
                } 
            } 
            foreach ($new_new as $key) {
            	echo "<li>".$key."</li>";
            }
          ?>
        </ul>

        <h3>Directions</h3>
        <ol>
        	<?php
        		$new_d_array = [];
        		$d_array = $row->directions;
        		//Decode array
        		foreach (json_decode($d_array) as $key) 
        		$new_d_array[] = $key;
        		
        		//Flatten array
        		if (!is_array($new_d_array)) { 
                return FALSE; 
            } 
            $new_new_d_array = array(); 
            foreach ($new_d_array as $key => $value) { 
                if (is_array($value)) { 
                    $new_new_d_array = array_merge($new_new_d_array, array_flatten($value)); 
                } else { 
                    $new_new_d_array[$key] = $value; 
                } 
            } 
            foreach ($new_new_d_array as $key) {
            	echo "<li>".$key."</li>";
            }
        	?>
        </ol>
      </div>
    </div>

  </div>
</div>



		<?php
	}
}else{
	echo "Sorry! No match was found with those ingredients, try adding more!";
}

?>
	</div>
</div>