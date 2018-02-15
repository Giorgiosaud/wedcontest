<?php
if ( ! function_exists('is_blog_installed')) {
    function is_blog_installed()
    {
        echo 'aqui';
        return true;
    }
}
if ( ! function_exists('write_log')) {
	/**
	 * function to write in log
	 * @param  @any $log anything to add to the log
	 * @return is a line into the blog
	 */
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}
if(! function_exists('show_select_field')){
   function show_select_field($id,$required,$incentiveText,$Optionsarray,$selectedOption){
      ?>
      <select name="<?=$id?>" <?php if($required){ echo 'required';}?>>
         <option value=""><?php _e($incentiveText,'wedcontest')?></option>
         <?php foreach ($Optionsarray as $key => $name) {?>
         <option value="<?= $key ?>" <?php if($key==$selectedOption){echo 'selected';}?>><?php _e($name,'wedcontest') ?> </option><?php } ?>
      </select>
      <?php
   }
}