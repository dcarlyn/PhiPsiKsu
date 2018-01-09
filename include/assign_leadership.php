<?php

/*This function will take in a member id, position id, and term id and update or create 
  a member position. This function assigns a position to a member for the specified term*/

  function assign_position($conn, $member_id, $position_id, $term_id)
  {
  		//Query
		$stmt = $conn->prepare("SELECT * FROM officers WHERE position = ? AND term = ?");
		$stmt->bind_param("ii", $position_id, $term_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();

			$stmt = $conn->prepare("UPDATE officers SET member = ? WHERE id = ?");
			$stmt->bind_param("ii", $member_id, $row["id"]);
			$stmt->execute();
			$stmt->close();

			if($conn->error)
				return false;
			else
				return true;

		}
		else
		{
			$stmt = $conn->prepare("INSERT INTO officers (position, member, term) VALUES (?, ?, ?)");
			$stmt->bind_param("iii", $position_id, $member_id, $term_id);
			$stmt->execute();
			$stmt->close();

			if($conn->error)
			{
				return false;
			}
			else
				return true;
		}
  }



?>