<?php echo $this->load->view('layout/left-menu'); ?>

<h1>Assign Task</h1>
<div class="col-xs-offset-2 col-xs-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">Assign Task</h3>
        </div>
        <div class="panel-body">
            <form name="asign_new_task" id="asign_new_task" method="post" action="<?php echo frontend_url() . 'tasks/insert_asign_task'; ?>" data-parsley-validate="">
                <div class="form-group">
                    <label>Select Project <span style="color:red">*</span></label>
                    <select name="asign_project" id="asign_project" class="form-control" required="" <?php if ($_SESSION['user_type_id'] == 5): ?> onchange="get_user_details(<?php echo $_SESSION['user_departments_id'] ?>);"<?php endif; ?>>
                        <option value="">-Select Project-</option>
                        <?php foreach ($project_details as $details): ?>
                            <option value="<?php echo $details['projects_id']; ?>"><?php echo $details['project_name']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <?php if ($_SESSION['user_type_id'] != 5): ?>
                    <div class="form-group">
                        <label>Select User Type <span style="color:red">*</span></label>
                        <select name="asign_usertype" id="asign_usertype" class="form-control" required="" onchange="getdepartments(this.value)">
                            <option value="">-Select User Type-</option>
                            <?php foreach ($usertype_details as $details): ?>
                                <option value="<?php echo $details['id']; ?>"><?php echo $details['type_name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                <?php endif; ?>
                <div id="departments_details" class="form-group" style="display: none">
                    <div class="clear" style="clear: both;height:1em"></div>
                    <label>Select Departments <span style="color:red">*</span></label>
                    <select style="width:100%" name="asign_departments" id="asign_departments" class="form-control" onchange="get_user_details(this.value)">
                        <option value="">-Select Department-</option>
                        <?php foreach ($department_details as $details): ?>
                            <option value="<?php echo $details['id']; ?>"><?php echo $details['name']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div id="employee_details">

                </div>
                <div class="form-group">
                    <label>Task Title <span style="color:red">*</span></label>
                    <input type="text" name="asign_task_title" id="asign_task_title" required="" class="form-control" placeholder="Enter Task Title"/>
                </div>
                <div class="form-group">
                    <label>Message <span style="color:red">*</span></label>
                    <textarea placeholder="Enter Message" name="asign_task_message" id="asign_task_message" class="form-control" rows="5" style="resize:none" required="" data-parsley-minlength="5" maxlength="1000"></textarea>
                </div>
                <div class="form-group">
                    <label>Start Date <span style="color:red">*</span></label>
                    <input type="text" required="" name="asign_start_date" id="asign_start_date" class="form-control" placeholder="Choose Start Date"/>
                </div>
                <div class="form-group">
                    <label>End Date <span style="color:red">*</span></label>
                    <input type="text" required="" name="asign_end_date" id="asign_end_date" class="form-control" placeholder="Choose End Date"/>
                </div>
                <div class="form-group">
                    <label>Enter Duration Hours <span style="color:red">*</span></label>
                    <input type="text" required="" name="asign_duration_hours" id="add_duration_hours" class="form-control" placeholder="Choose Duration Hours"/>
                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            <input type="submit" name="asign-task-submit" id="task-submit" tabindex="4" class="form-control btn btn-primary" value="Add">
                        </div>
                        <div class="col-sm-3 ">
                            <input type="reset" name="asign-task-reset" id="task-reset" tabindex="4" class="form-control btn btn-danger" value="Clear">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

    $(function () {
        $('#asign_start_date').datetimepicker({
            daysOfWeekDisabled: [0],
            minDate: moment(),
            useCurrent: false,
        });
        $('#asign_end_date').datetimepicker({
            useCurrent: false,
        });
        $("#asign_start_date").on("dp.change", function (e) {
            $('#asign_end_date').data("DateTimePicker").minDate(e.date);
        });


    });
</script>