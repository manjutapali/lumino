
<div class = "col-lg-10 col-lg-offset-1 section" >

	<h4 class="cn-header">RIS List</h4>
	<table class = "table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Requestor</th>
				<th>Due date</th>
				<th>Task</th>
				<th>instruction</th>
				<th>priority</th>
				<th>status</th>
				<th>worklog</th>
			</tr>
		</thead>
		<tbody>
			<?php

				$status = array(
					0 => 'In queue',
					1 => 'Executing',
					2 => 'Executed'
				 );

				$priority = array(
					0 => 'Low',
					1 => 'Medium',
					2 => 'High'
				);

				foreach ($list as $ris) {
					echo "<tr>";
					echo "<td>" . $ris['id'] . "</td>";
					echo "<td>" . $ris['title'] . "</td>";
					echo "<td>" . $ris['requestor'] . "</td>";
					echo "<td>" . $ris['due_date'] . "</td>";
					echo "<td>" . $ris['task'] . "</td>";
					echo "<td>" . $ris['instructions'] . "</td>";
					echo "<td>" . $priority[$ris['priority']] . "</td>";
					echo "<td>" . $status[$ris['status']] . "</td>";
					echo "<td>" . $ris['worklog'] . "</td>";
				}
			?>
		</tbody>
	</table>

</div>