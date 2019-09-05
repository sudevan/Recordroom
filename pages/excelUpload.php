  <?php 
  session_start();
  ini_set("display_errors",1);
  include("connection.php");
  require_once 'excel_reader2.php';
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  $data = array();

  function readExcel($file)
  {


      $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
      $reader->setReadDataOnly(true);
      $spreadsheet=$reader->load($file);
      $sheetData = $spreadsheet->getActiveSheet()->toArray();
      $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
      $titles = $sheetData[0];
      $columns = count($titles);

      print_r($titles);

      for( $i=1;$i<$highestRow;$i++)
      {
        $row = $sheetData[$i];
        for($j = 0; $j <$columns; $j++ )
        {
          $recorddata[$titles[$j]] = $row[$j];

        }
        add_record($recorddata);
      }
  }
  function add_record($newrecord)
  {
    global $conn;
    $recordtable="rec_location_master";
    $bundlenumber=$newrecord['bundle_number'];
    $location=$newrecord['location'];
    $check="SELECT location from $recordtable where bundle_number='$bundlenumber'";
    $result=$conn->query($check);
    $data=mysqli_fetch_assoc($result);
    $id=$data['location'];
    if ($id===null) {

    $sql="INSERT into $recordtable values('$bundlenumber','$location')";
    $result=$conn->query($sql);
    if($result)
    {
      echo "successfully inserted data on bundle_location";
      echo "<script>alert('successfully added the location');window.location.assign('addlocation.php');</script>";
    }
    else
    {
      echo "failed to insert on bundle_location $id";
    }
  }
else 
{
  $sql="UPDATE $recordtable set location='$location' where bundle_number='$bundlenumber'";
  $result=$conn->query($sql);
  echo "<script>alert('successfully updated the location');window.location.assign('addlocation.php');</script>";
}
}
    readExcel($_FILES['file']['tmp_name'] );
    ?>