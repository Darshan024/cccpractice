<?php
class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    public function viewAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $view = $layout->createBlock('import/view');
        $child->addChild('view', $view);
        $layout->toHtml();
    }
    public function uploadAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $form = $layout->createBlock('import/form');
            $child->addChild('from', $form);
            $layout->toHtml();
        } elseif ($this->getRequest()->isPost()) {
            if (isset ($_POST['submit'])) {
                $imageName = $_FILES['data']['name'];
                $tmp_name = $_FILES['data']['tmp_name'];
                $folder = "media/import/" . $imageName;
                move_uploaded_file($tmp_name, $folder);
                echo 'moved successfully';
            }
        }
    }
    public function readAction()
    {
        $row = 0;
        $path = 'media/import/read.csv';
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (!$row) {
                    $header = $data;
                    $row++;
                    continue;
                }
                $data1 = array_combine($header, $data);
                $data1 = json_encode($data1);
                Mage::getModel("import/import")->addData("data", $data1)->addData('file_name', 'read.csv', )->save();
                echo "<br>";
                $row++;
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }

            }
            echo $row;
            fclose($handle);
        }
    }
    public function importAction()
    {
        $data = Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('file_name', 'read.csv');
        foreach ($data->getData() as $data1) {
            $fileData = $data1->getData();
            $importData = $fileData['data'];
            $importData = json_decode($importData, true);
            // Mage::getModel('import/temp')->setData($importData)->save();
            // echo 'save';
            $data1->adddata('status', 1)->save();
        }
    }
}
?>
<?php
// include "app/Mage.php";
// include "app/code/Local/autoload.php";
// $row = 0;
// $path = "import / test . csv";
// echo $path;
// if (($handle = fopen($path, "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         if (!$row) {
//             $header = $data;
//             $row++;
//             continue;
//     }
//     $data1 = array_combine($header, $data);
//     $data1 = json_encode($data1);
//     Mage::getModel("import/import")->addData("data", $data1)->save();
//     echo "<br>";
//     $row++;
//     $num = count($data);
//     echo "<p> $num fields in line $row: <br /></p>\n";
//     $row++;
//     for ($c=0; $c < $num; $c++) {
//         echo $data[$c] . "<br />\n";
//     }

// }
//     echo $row;
//     fclose($handle);
// }
// foreach($data as $key => $val){
//     $dataString=json_encode($val);

//     print_r(json_decode($dataString,true));
//     die();


// }
//             ?>