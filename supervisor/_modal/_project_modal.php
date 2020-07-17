<!-- Edit -->
<div class="modal fade" id="add_comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Comment</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="comment_add.php">
            	<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group">
                    <label for="comment" class="col-sm-3 control-label">Comment</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="comment" name="comment" rows="10" required></textarea>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-check-square-o"></i> Add</button>
              </form>
            </div>
        </div>
    </div>
</div>