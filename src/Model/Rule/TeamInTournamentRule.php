<?php
namespace App\Model\Rule;
 
use Cake\Datasource\EntityInterface;
use Cake\ORM\TableRegistry;
 
class TeamInTournamentRule {
 
   /**
    * Performs the check
    *
    * @link http://php.net/manual/en/language.oop5.magic.php
    * @param \Cake\Datasource\EntityInterface $entity Entity.
    * @param array $options Options.
    * @return bool
    */
   public function __invoke(EntityInterface $entity, array $options) {

        if($entity->player1_id == $entity->player2_id) {
            return false;
        }

        if($this->_isPlayersInTournament($entity)) {
            return false;
        }

        return true;
   }
 
   /**
    * Gets the limitation from the ProfileConstraints Table object.
    *
    * @param \Cake\Datasource\EntityInterface $entity Entity.
    * @return int
    */
   protected function _isPlayersInTournament(EntityInterface $entity) {
      $teamsTable = TableRegistry::get('Teams');
      $query = $teamsTable->find('all')
        ->where([
            'tournament_id' => $entity->tournament_id,
            'OR' => [
                ['player1_id' => $entity->player1_id],
                ['player2_id' => $entity->player1_id],
                ['player1_id' => $entity->player2_id],
                ['player2_id' => $entity->player2_id]]
        ]);
 
        // $query->execute();
        $count = $query->count();
      return $count > 0;
   }
 
}