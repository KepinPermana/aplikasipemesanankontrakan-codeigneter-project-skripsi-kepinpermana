<div class="container-fluid">

	<h3><i class="fas fa-edit"></i>	EDIT DATA USER</h3>

	<?php foreach($user as $usr) : ?>


<form method="post" action="<?php echo base_url().'admin/user/update' ?>">

<div class="for-group">
	<label>Username</label>
	<input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>">
</div>

<div class="for-group">
	<label>Role Id</label>
	<input type="hidden" name="id" class="form-control" value="<?php echo $usr->id ?>">
	<input type="text" name="role_id" class="form-control" value="<?php echo $usr->role_id ?>">
</div>

<div class="for-group">
	<label>Password</label>
	<input type="text" name="password" class="form-control" value="<?php echo $usr->password ?>">
</div>


<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

</form>


<?php endforeach; ?>


</div>

