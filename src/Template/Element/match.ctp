<div class="jumbotron">
	<div class="row">
		<div class="col">
			<?php echo $match->table->name; ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $match->team1->player1->name; ?> og <?php echo $match->team1->player2->name; ?>
		</div>
		<div class="col">
			<?php echo $match->team1_score; ?>
		</div>
		<div class="col">vs.</div>
		<div class="col">
			<?php echo $match->team2_score; ?>
		</div>
		<div class="col">
			<?php echo $match->team2->player1->name; ?> og <?php echo $match->team2->player2->name; ?>
		</div>
	</div>
</div>