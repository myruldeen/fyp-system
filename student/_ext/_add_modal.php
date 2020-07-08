<div class="modal" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  <h4 class="modal-title">Add project</h4>
			</div>
			<div class="modal-body form-horizontal">
			<span id="status"></span>
			  <form class="form-horizontal" role="form" action="" method="POST" id="add_project" onsubmit="return false;">
				<div class="form-group">
			  <label for="title" class="control-label col-xs-2">Title</label>
			  <div class="col-xs-10">
				<input type="text" class="form-control" id="title" name="title" onfocus="emptyElement('status')">
			  </div>
			</div>
			<div class="form-group">
			  <label for="title" class="control-label col-xs-2">Description</label>
			  <div class="col-xs-10">
			  	<textarea class="form-control" id="description" name="description" rows="10" onfocus="emptyElement('status')"></textarea>

			  </div>
			</div>
			<div class="form-group">
			  <label for="title" class="control-label col-xs-2">Category</label>
			  <div class="col-xs-10">
				<select class="form-control" name="category" id="category" onselect="emptyElement('status')">
				    	<option value="network">Network</option>
				    	<option value="system">System</option>
				    	<option value="multimedia">Multimedia</option>
				    </select>
			  </div>
			</div>
			<div class="form-group">
			  <label for="title" class="control-label col-xs-2">Image</label>
			  <div class="col-xs-10">
				<input type="file" name="file" id="file" accept="image/*" onchange="showMyImage(this)">
				<img id="thumbnil" style="width:20%; margin-top:10px;"  src="" alt="image"/>
			  </div>
			</div>
			  
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-primary" onclick="add_project()">Save changes</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>