<?php
require '../classes/service/ServiceContainer.php';
require '../classes/service/Response.php';

header('Content-type: application/json');

$id = isset($_POST['studentId']) ? $_POST['studentId'] : '';

$studService = ServiceContainer::getService('StudentService');

$result = $studService->deleteStudentByID($id);

$res = new Response();

$res = $result? $res->setStatus('success')->setMessage('Student record has been deleted'):
                $res->setStatus('fail')->setMessage('Fail to delete student record');

echo json_encode($res);

