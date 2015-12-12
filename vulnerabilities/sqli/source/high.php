<?php	

if (isset($_GET['Submit'])) {

	// Retrieve data

	$id = $_GET['id'];
	$id = stripslashes($id);
	$id = mysql_real_escape_string($id);

	if (is_numeric($id)){

		$getid = "SELECT first_name, last_name, avatar FROM users WHERE user_id = '$id'";
		$result = mysql_query($getid) or die('<pre>' . mysql_error() . '</pre>' );

		$num = mysql_numrows($result);

		$i=0;

        $html .= '<table id="tablares">
        <thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Foto</th>
			</tr>
		</thead>';

		while ($i < $num) {

			$first = mysql_result($result,$i,"first_name");
			$last = mysql_result($result,$i,"last_name");
            $foto = mysql_result($result,$i,"avatar");

            $html .='<tbody>';
            $html .= '<tr>';
            $html .= '<td id="tdfirst">' .$first .'</td>';
            $html .= '<td id="tdlast">' .$last . '</td>';
            $html .= '<td id="tdfoto"><img src='. $foto.'></td>';
            $html .= '</tr>
                  </tbody>';

			$i++;
		}
        $html .= '</table>';
	}
}
?>
