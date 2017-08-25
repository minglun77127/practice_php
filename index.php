<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container">
<?php
require 'classes/service/ServiceContainer.php';

$studentService = ServiceContainer::getService('StudentService');
$result = $studentService->getAllStudents();

$array = array();
if ($result->num_rows > 0):
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th><th>First Name</th><th>Last Name</th><th></th>
            </tr>
        </thead>
        <tbody>
<?php
    while($row = $result->fetch_assoc()):
        $array[] = $row;
?>
        <tr>
            <td><?=$row["id"]?></td>
            <td><?=$row["firstName"]?></td>
            <td><?=$row["lastName"]?></td>
            <td><button class="btn btn-default">Update</button>
                <button class="btn btn-primary">Email</button>
                <button class="btn btn-danger btn-remove" data-id="<?=$row["id"]?>">Remove</button></td>
        </tr>
<?php
    endwhile;
else :
?>
        <div class="alert alert-warning">No record found</div>
<?php
endif;
?>
        </tbody>
    </table>
</div>

<?php include 'app-include/footer.html'; ?>

<script>
    $(function(){
        $('.btn-remove').onAsObservable('click')
            .map(event=>$(event.target))
            .flatMapLatest(el=>ServiceFactory.getService('User').deleteStudentByID(el.data('id')), (el, res)=>({el: el, res: res}))
            .subscribe(data=>{
                if(data.res.status=='success'){
                    data.el.closest('tr').remove();
                }else{
                    popAlert(data.res.header, data.res.message);
                }
            },error=>popAlert('Connection Error', error)
        );
    });
</script>

