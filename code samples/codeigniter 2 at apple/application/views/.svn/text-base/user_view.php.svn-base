<div class='filter_content'>
<div id='contentform'><?php
$firstname = '';
$lastname = '';
$email = '';
echo validation_errors();
if (isset($insert)) {
    echo $success;
    echo form_open('index.php/user/insert');
    $firstname = '';
    $lastname = '';
    $email = '';
    $admin = '';
} else {
    echo form_open('index.php/user/edit');
    echo $success;
    $admin = '';
    foreach ($user->result() as $row) {
        $firstname = $row->firstname;
        $lastname = $row->lastname;
        $email = $row->email;
        $admin = $row->is_admin;
    }
    echo "<input type=hidden name='id' value='" . $id . "'>";
}
?>
firstname<input type=text name='first_name' value = <?php echo set_value('first_name', $firstname); ?>>

lastname<input type=text name='last_name' value = <?php echo set_value('last_name', $lastname); ?>>

email <input type=text name='email' value = <?php echo set_value('email', $email); ?>>
<?php if (!isset($insert)) { ?>
    Admin <select name='admin'>    
        <option value="0" <?php if ($admin == 0)
        echo "selected"; ?>>No</option>
        <option value="1" <?php if ($admin == 1)
        echo "selected"; ?>> Yes</option>
    </select>    
<?php }

else { ?>
    
    
    Admin <select name='admin'>    
        <option value='0' <?php echo set_select('admin', '0', true); ?>>No</option>
        <option value='1'<?php echo set_select('admin', '1'); ?>> Yes</option>
    </select>    
<?php } ?>
<input type='submit'>
<div id='contentform'>
<div id='colmain_div'>


<div id="ajax-content" style="position: relative;">

    <div id='ajax-content'>

<?php echo $table; ?>

    </div>
</div>
</div>

</div>
</div></div>

	
 <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>

	
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.tablesorter.js"></script>
	
	<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#mytable").tablesorter({sortList: [[0,0]]}); 
    } 
);
	</script>	
