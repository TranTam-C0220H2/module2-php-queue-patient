<?php
include 'Patient.php';
include 'Queue.php';

$queue = new Queue();
//Một bệnh nhân mới tên là Smith, có mã bệnh nhân là 5
$queue->enqueueByIndex($queue->getLastIndexByNodeData(5),'Smith',5);
//Một bệnh nhân mới tên là Jones, có mã bệnh nhân là 4
$queue->enqueueByIndex($queue->getLastIndexByNodeData(4),'Jones',4);
//Một bệnh nhân mới tên là Fehrenbach, có mã bệnh nhân là 6
$queue->enqueueByIndex($queue->getLastIndexByNodeData(6),'Fehrenbach',6);
//Một bệnh nhân mới tên là Brown, có mã bệnh nhân là 1
$queue->enqueueByIndex($queue->getLastIndexByNodeData(1),'Brown',1);
//Một bệnh nhân mới tên là Ingram, có mã bệnh nhân là 1
$queue->enqueueByIndex($queue->getLastIndexByNodeData(1),'Ingram',1);
//Hiển thị danh sách bệnh nhân
echo implode('-',$queue->printByName()).'<br>';
//Khám bệnh cho người đầu tiên trong hàng đợi (đã sắp xếp theo độ ưu tiên)
//Hiển thị tên của người bệnh đã được khám
echo $queue->dequeue()->getName().'<br>';
//Hiển thị danh sách bệnh nhân còn lại
echo implode('-',$queue->printByName()).'<br>';
//Khám bệnh
//Hiển thị tên của người bệnh đã được khám
echo $queue->dequeue()->getName().'<br>';
//Hiển thị danh sách bệnh nhân còn lại
echo implode('-',$queue->printByName()).'<br>';
$queue->toString();
