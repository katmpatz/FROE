<div class="row mb-3 mt-4 button-div" style="margin-right:0px !important;margin-left:0px !important;">
  <div class="col text-center">
    <button
      href="#"
      class="btn btn-wider btn-design <?php echo $style;?>"
      id = "btn_<?php echo $id;?>"
      onclick="
        $('body').trigger('next', ['<?php echo $id;?>']); 
        $('body').trigger('show', ['<?php echo $next;?>']); 
        <?php if ($save_page) {?>
          $('body').trigger('finished');  
        <?php
      }?>
        $('#<?php echo $hide ?>').hide().promise().done(() => {if (!excluded) $('#<?php echo $show ?>').show()});"
      <?php if($disabled) echo ' disabled';?> >
        <?php echo $text; ?>
    </button>
  </div>
</div>
