<?php
require_once 'DBConfig.php';

class ExerciseRepository {
    private $connection;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->connection = $dbConfig->getConnection();
    }

    private function getExercisesByGoalAndDifficulty($table, $goal, $difficulty, $limit) {
        $query = "SELECT * FROM public.$table WHERE ex_goal = :goal AND ex_diff_level = :difficulty LIMIT :limit";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':goal', $goal);
        $stmt->bindParam(':difficulty', $difficulty);
    
        $limitParam = (int)$limit; 
        $stmt->bindParam(':limit', $limitParam, PDO::PARAM_INT);
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve warmup exercises by user goal and difficulty
    public function getWarmupExercisesByGoalAndDifficulty($goal, $difficulty) {
        return $this->getExercisesByGoalAndDifficulty('warmup', $goal, 1,2);
    }

    // Method to retrieve main exercises by user goal and difficulty
    public function getMainExercisesByGoalAndDifficulty($goal, $difficulty) {
        return $this->getExercisesByGoalAndDifficulty('mainexs', $goal, $difficulty,5);
    }

    // Method to retrieve cooldown exercises by user goal and difficulty
    public function getCooldownExercisesByGoalAndDifficulty($goal, $difficulty) {
        return $this->getExercisesByGoalAndDifficulty('cooldown', $goal, 1,3);
    }

    // Method to retrieve exercises based on user state and difficulty level
    public function getExercisesByUserStateAndDifficulty($userState, $goal, $difficulty) {
        switch ($userState) {
            case 'warmup':
                return $this->getWarmupExercisesByGoalAndDifficulty($goal, $difficulty);
            case 'main':
                return $this->getMainExercisesByGoalAndDifficulty($goal, $difficulty);
            case 'cooldown':
                return $this->getCooldownExercisesByGoalAndDifficulty($goal, $difficulty);
            default:
                return [];
        }
    }
}
?>
