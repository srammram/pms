<?php echo $this->load->view('layout/left-menu'); ?>
<div class="col-xs-12">
    <h1>Manage Projects</h1>
    <div class="clear" style="clear: both;height:3em"></div>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Manage Projects
        </div>
        <div class="panel-body">
            <div class="col-xs-12">
                <a href="javascript:void(0)" class="btn btn-danger" onclick="activate_users('departments', '3')">Delete</a>
            </div>
            <div class="col-xs-12" id="empsucc_message">

            </div>
            <table id="projects_table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="selectall" id="selectall" value="selectall"/></th>
                        <th>S.No</th>
                        <th>Project Title</th>
                        <th>Project Description</th>
                        <th>Project Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($project_details)):
                        foreach ($project_details as $prodet):
                            if ($prodet['status'] == 0):
                                $lableclass = "label label-warning";
                                $status = 'Pending';
                            elseif ($prodet['status'] == 1):
                                $lableclass = "label label-success";
                                $status = 'Active';
                            else:
                                $lableclass = "label label-danger";
                                $status = 'Ignored';
                            endif;
                            if ($prodet['project_type_status'] == 1):
                                $protype = 'Ongoing';
                            elseif ($prodet['project_type_status'] == 2):
                                $protype = 'Upcoming';
                            elseif ($prodet['project_type_status'] == 3):
                                $protype = 'Pipeline';
                            endif;
                            ?>
                            <tr>
                                <td><input type="checkbox" class="selectthis" value="<?php echo $prodet['id']; ?>"/></td>
                                <td><?= ($prodet['id']); ?></td>
                                <td><?= stripslashes($prodet['project_name']); ?></td>
                                <td><?= stripslashes($prodet['project_description']); ?></td>
                                <td><?= $protype; ?></td>
                                <td><label class="<?php echo $lableclass; ?>" style="font-size:12px"><?php echo $status; ?></label></td>
                                <td><a  class="btn btn-success" href="#EditProject" data-toggle="modal" onclick="editproject(<?php echo $prodet['id']; ?>)"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" class="btn btn-danger" onclick="delete_actions(<?php echo $prodet['id']; ?>, 'projects')"><i class="fa fa-trash"></i></a><a href="javascript:void(0)" class="btn btn-warning" title="Assign Team for this project"><i class="fa fa-tasks"></i></a></td>
                            </tr>
                            <?php
                        endforeach;
                    else:
                        echo "No Records Found";
                    endif;
                    ?>

                </tbody>
            </table>
            <div class="col-xs-12">
                <a href="javascript:void(0)" class="btn btn-danger" onclick="activate_users('departments', '3')">Delete</a>
            </div>
        </div>
    </div>
</div>
</div>
<div id="EditProject" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" id="projectsedit">

        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#projects_table').DataTable();
    });

</script>