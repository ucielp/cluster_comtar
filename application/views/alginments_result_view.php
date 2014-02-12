		<p><a href="javascript:history.go(-1)" class="goback_alignments">Go Back</a></p>

 <div class="loading">
	 <img src="<?php echo base_url(); ?>css/loading.gif" border="0">
	<p> Loading, please wait. </p>
</div>

  <?php
	echo "<table id = 'targets' align = center>";
	echo '<tr align = center>
			<th>
				Arabidopsis Tag' . '<a href="#" class = "tooltip">[?]<span>
				'. ATH_TAG_MSG .'</a></span>
			</th>
			<th>
				Sequence ID
			</th>
			<th>Species
			</th>
			<th>
				5\'-target-3\'<br>
				    Alignment<br>
					3\'-miRNA-5\'' . '<a href="#" class = "tooltip">[?]<span>
				'. ALIGNMENT_MSG .'</span>
			</th>
			<th>
				MFE' . '<a href="#" class = "tooltip">[?]<span>
				'. MFE_MSG .'</span>
			</th>
		</tr>';
		foreach ($alignments as $alignment){

			$class_alignment = 'default';
			$class_deltag = 'default';

            # Si tiene el filtro cambio de color a los que no lo pasan
            if (!$alignment->filtro_mm){
                $class_alignment = 'altert_color';
                
            }

			
			if($energy < $alignment->deltag){
					$class_deltag = 'altert_color';
			}
            $similar = $alignment->{SIMILAR_field} ;

			echo "<tr>";
                echo "<td>" . $similar. "</td>";
				echo "<td>" . $alignment->gen . "</td>";
				echo "<td>" . $alignment->file . "</td>";
				echo "<td class= $class_alignment ><PRE>" . $alignment->target . "</br>" 
								 . $alignment->align  . "</br>"
								 . $alignment->mirna  . 
					"</PRE></td>";
				echo "<td class = $class_deltag>" . $alignment->deltag . "</td>";
			echo "</tr>";		
		}
		
    	
	echo "</table>";
  ?>

</div >

<script>
jQuery(window).load(function () {
    $(".loading").hide();
    $(".query_result").show();

});
</script>

