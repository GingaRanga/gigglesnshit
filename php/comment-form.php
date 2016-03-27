<form class="bg-dark" style="padding:5%;" method="post">
	<div class="form-group">
      	<label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Please enter your username here...">
  	</div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Please enter your email here...">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Please enter your password here...">
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea type="text" class="form-control" name="comment" id="comment" rows="10" placeholder="Please leave your comment here..."></textarea>
    </div>
    <div class="hidden">
      	<input type="hidden" name="articleid" id="articleid" value="<? echo $_GET['id']; ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>