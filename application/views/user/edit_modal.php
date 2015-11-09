<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="updateLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Form submit for update -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- Title -->
                    <h4 class="modal-title" id="updateLable">Edit User Profile</h4>
                </div>
                <!-- Content update here -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="uploadAvatar" class="form-control" value="uploadAvatar" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" value="Value here" name="address" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="moreabout">More About</label><br>
                        <textarea name="info" id="moreabout" cols="75" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <!-- Close and submit button -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>