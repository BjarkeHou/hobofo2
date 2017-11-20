<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Tilføj hold
</button>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tilføj hold</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<?php 
	            	echo $this->Form->create(null, ['url' => ['controller' => 'Teams', 'action' => 'add']]);
	            	echo $this->Form->hidden('tournament_id', ['value'=>$tournament_id]);
	            	echo $this->Form->text('player1_id');
	            	echo $this->Form->text('player2_id');
            	?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php 
                	echo $this->Form->button('Tilføj', ['type' => 'submit']);
					echo $this->Form->end();
                ?>
                <!-- <button type="button" class="btn btn-primary">Tilføj</button> -->
            </div>
        </div>
    </div>
</div>