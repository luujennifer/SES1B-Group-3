<?php
	// MANAGE LOANS SCRIPT
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$loan_id = $_POST['loan_id'];
    $book_id = $_POST['book_id'];
    
    
    if(isset($_POST['return'])){ /* remove from loans and update copy number */
        $update_copies = "UPDATE books SET copies = copies + 1 WHERE book_id = $book_id";
        mysqli_query($conn, $update_copies); 
        $sql = "DELETE FROM loans WHERE loan_id = $loan_id";

        
        
    } else if(isset($_POST['renew'])) {  /* extend due date */
        $sql = "UPDATE loans SET due_date = ADDDATE(now(), INTERVAL 14 DAY) WHERE loan_id = $loan_id";
		
    }

			
	if (!mysqli_query($conn, $sql)) { /* failed */
		echo "<script>alert('Material loans failed to update, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/staff-update-loans.html')</script>";
	}
	
	else { /* pass */
		echo "<script>alert('Material loans updated sucessfully.')</script>";
		echo "<script>location.replace('../HTML Files/staffs-manage-loans.php')</script>";
	}

?>