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

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>School board</th>
                </tr>
            </thead>
            <tbody>
	            <?php
	                // Generate students list
	                foreach ($data['students'] as $student) {

	                	echo '<tr>';
	                	echo '<td>' . $student->id . '</td>';
	                	echo '<td>' . $student->name . ' ' . $student->surname . '</td>';
	                	echo '<td>' . $student->school_board . '</td>';
                        echo '</tr>';
	                }
	            ?>
            </tbody>
        </table>

    </body>

</html>