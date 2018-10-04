<td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $id ?>">Edit</button>
				<!-- Modal -->
				<div class="modal fade" id="edit-<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $id ?>">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editLabel-<?php echo $id ?>">Edit Data</h4>
				      </div>	
				      <form>
				      <div class="modal-body">
				      	<input type="hidden" id="<?php echo $id ?>" value="<?php echo $id ?>">
				        <div class="form-group">
		                  <label class="control-label" for="cancer_date">Date Diagnosed</label>
		                  <input type="text" class="form-control" id="cancer_date-<?php echo $id ?>" value="<?php echo $CancerDate ?>">
		                </div>
		                <div class="form-group">
		                  <label class="control-label" for="cancer_stage">Stage</label>
		                  <select class="form-control" id="cancer_stage-<?php echo $id ?>"> 
		                  	<option><?php echo $StageID ?></option>
                          </select>
		                </div>
		                <div class="form-group">
		                  <label class="control-label" for="cancer_cancer">Cancer</label>
		                  <select class="form-control" id="cancer_cancer-<?php echo $id ?>"> 
		                  	<option><?php echo $CancerID ?></option>
                          </select>
		                </div>
		                
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" onclick="updateData(<?php echo $id ?>)" class="btn btn-primary">Update</button>
				      </div>
				      <form>
				    </div>
				  </div>
				</div>
				<button type="submit" onclick="deleteData(<?php echo $id ?>)" class="btn btn-danger">Delete</button>
			<td>