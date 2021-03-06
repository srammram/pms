<form data-parsley-validate="" name="reasign_dependency" id="reasign_dependency" method="post" action="<?php echo frontend_url() . 'tasks/update_reasign_dependency' ?>">
    <input type="hidden" name="dependency_id" id="dependency_id" value="<?php echo $records[0]['id']; ?>"/>
    <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Reassign Dependency</h3>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Set Datetime <span style="color:red">*</span></label>
            <input required="" type="text" name="set_datetime" id="set_datetime" class="form-control" placeholder="Choose Date"/>
        </div>
        <div class="form-group">
            <label>Reassign Message <span style="color:red">*</span></label>
            <textarea name="reassign_message" id="reassign_message" class="form-control" style="resize:none"/>
        </div>
        <div class="form-group">
            <label>Change Status <span style="color:red">*</span></label>
            <select required="" name="change_status" id="change_status" class="form-control" style="width:100%">
                <option value="">Change Status</option>
                <option value="3" <?php
                if ($records[0]['dependency_status'] == 'Set'): echo "selected";
                endif;
                ?>>Set</option>
                <option value="4" <?php
                if ($records[0]['dependency_status'] == 'Unset'): echo "selected";
                endif;
                ?>>Unset</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="update_dependency" id="update_dependency" class="btn btn-success" value="Update"/>
            <input type="button" name="task_close" id="task_close" class="btn btn-danger" value="Close" style="float:right" data-dismiss="modal" aria-hidden="true"/>
        </div>
        <div class="clear" style="clear: both;height:2em"></div>
    </div>
</form>
<script type="text/javascript">

    $('#change_status').select2(
            {
                placeholder: 'Change Status'
            }
    );

    $('#set_datetime').datetimepicker({
        daysOfWeekDisabled: [0],
        useCurrent: false,
        minDate: moment(),
    });
</script>
