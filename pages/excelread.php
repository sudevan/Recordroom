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

		/*
			$data = new Spreadsheet_Excel_Reader($file);
			echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
			$numrows=$data->sheets[0]['numRows'];
			$numcols=$data->sheets[0]['numCols'];
			$title=$data->sheets[0]['cells'][1];
			print_r($title);
			for($i=2;$i<=$numrows;$i++)
			{
				for($j=1;$j<=$numcols;$j++)
				{
					print_r($data->sheets[0]['cells'][$i][$j]);
				}
			} */
	}
	function getPersonid($personame)
	{
				//echo "$personame <br>";
		global $conn;
		
		$tablename = "rec_person";
		$sql="SELECT id from $tablename where name='$personame'";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();

		if(is_array($row)) {
			return $row['id'];
		}
		else
		{
			// no such  person in db. insert and get the id
			$sql1="INSERT into $tablename(name) values('$personame')";
			$result=$conn->query($sql1);

			//using previous query
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			return $row['id'];
		}
		return 1;

	} 
	function add_tags($recordid,$tags)
	{
		global $conn;
		#$sql = "INSERT INTO rec_tags(recordid,tag) values($recordid,'$tags')";
		#$result=$conn->query($sql);
		
		#in case if we need to put each tag as sepaeate record
		$tagarray = preg_split('/\s+/', $tags);
		foreach ($tagarray as $tag) {
			$sql = "INSERT INTO rec_tags(recordid,tag) values($recordid,'$tag')";
			$result=$conn->query($sql);
			echo $tag;
		}
		
	}
	function add_record($newrecord)
	{
		global $conn;
		
		$recordtable="rec_record_master";
		$filenumber=$newrecord['file number'];
		$section=$newrecord['section number'];
		$year=$newrecord['year'];
		$subject=$newrecord['Subject'];
		$category=$newrecord['category'];
		$ddate=$newrecord['Date'];
		$enteredby=1;
		$pages=$newrecord['pages'];
		$tags=$newrecord['Tag'];

		$bundlenumber = $newrecord['Bundle number'];

		$ddate = date("Y-m-d", strtotime($ddate));
		
		if($newrecord['Person'] != '' )
		{
			$personid =  getPersonid($newrecord['Person']);
		}
		else
		{
			$personid=0;
		}
		if($pages == ">10" )
		{
			$pages=11;
		}
		$sql= "INSERT into $recordtable(section,filenumber,year,subject,category,pages,ddate,enteredby,personid) 	values('$section','$filenumber',$year,'$subject','$category',$pages,'$ddate',$enteredby,$personid)";


		$result=$conn->query($sql);
		if($result == true)
		{
			$bundletable="rec_bundle_record";
			echo "Inserted $filenumber - ";
			$sql="SELECT LAST_INSERT_ID() as id";
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			$id=$row['id'];
			$sql = "INSERT INTO $bundletable(bundlenumber,recordid) values ($bundlenumber,$id)";
			$result=$conn->query($sql);
			if($result == true)
			{
				echo "Updated Bundle number";
			}
			else
			{
				echo "Failed to update bundle";
			}

			if($tags != '')
			{
				add_tags($id,$tags);
			}

		}
		else
		{
			echo "Failed to insert $filenumber";
			echo " $sql";
		}

		echo "<br>";
	


	}

	#reading uploaded data into an array

	readExcel($_FILES['file']['tmp_name'] );
	/*
	if ( $_FILES['file']['tmp_name'] )
	{	
		
	 $dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
	 $rows = $dom->getElementsByTagName( 'Row' );
	 $first_row = true;
	 foreach ($rows as $row)
	 {
	 	
	   if ( !$first_row )
	   {

	     $cells = $row->getElementsByTagName( 'Cell' );
	     $index = 1;
	     foreach( $cells as $cell )
	     {
	       //$ind = $cell->getAttribute( 'Index' );
	       //if ( $ind != null ) $index = $ind;
	       $student[$title[$index]]= $cell->nodeValue;
	       $index += 1;
	     }
	     $data[] = $student;
	     add_record($student);
	     }
	   else 
	   {
	   	
	   	$first_row = false;
	   	$index = 1;
	   	$cells = $row->getElementsByTagName( 'Cell' );
	   	 foreach( $cells as $cell ){
	   	 	$ind = $cell->getAttribute( 'Index' );
	   	 	if ( $ind != null ) $index = $ind;

		 	$title[$index] = $cell->nodeValue;
		 	$index += 1;

	   	 }
	   	 print_r($title);
	   	 

	   	}
	   	
	 }
	}*/
	?>
	<html>
	<body>
	<?php echo "Hello";?>
	</body>
	</html>
