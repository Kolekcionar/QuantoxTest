<!DOCTYPE html>
<html>

    <head>
        <title>Quantox Students</title>
    </head>

    <body>

	    <style>
		    body {
			    padding-top: 100px;
			    text-align: center;
		    }

		    table {
			    margin: auto;
		    }
            th, td {
                padding: 15px;
                text-align: left;
            }
	    </style>

	    <?php $student = $data['student']; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>School board</th>
                    <?php echo $student->school_board == 'CSM' ? '<th>Grades average</th>' : ''; ?>
	                <th>Status</th>
                </tr>
            </thead>
            <tbody>
	            <?php
	                // Show student data
                    echo '<tr>';
                    echo '<td>' . $student->id . '</td>';
                    echo '<td>' . $student->name . ' ' . $student->surname . '</td>';
                    echo '<td>' . $student->school_board . '</td>';
	                echo $student->school_board == 'CSM' ? '<td>' . $student->grades_average . '</td>' : '';
                    echo '<td>' . $student->status . '</td>';
                    echo '</tr>';
	            ?>
            </tbody>
        </table>

        <?php
            // Download
			echo '<a href="' . URLROOT . '/outputs/getJSON/?id=' . $student->id . '"> GET JSON </a>';
			echo '<br/><br/>';
            echo '<a href="' . URLROOT . '/outputs/getXML/?id=' . $student->id . '"> GET XML </a>';
        ?>
    </body>

</html>