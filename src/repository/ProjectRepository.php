<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject (int $id): ?Project
    {
        $stmt = $this->database->connect()->prepare(
           'SELECT * FROM advertisements WHERE id = :id'

        );

        $stmt->bindParam(':email', $id, PDO::PARAM_INT);

        $stmt->execute();
        $project = $stmt ->fetch(PDO::FETCH_ASSOC);

        if($project == false) {
            //TODO TRYCATCH
            return null;

        }
        //($title, $description,$model, $millage, $productionYear, $fuel, $price, $image)
        return new Project(
            $project['title'],
            $project['description'],
            $project['model'],
            $project['millage'],
            $project['productionYear'],
            $project['fuel'],
            $project['price'],
            $project['image']

        );
    }

        public function addProject(Project $project): void
        {
            $date = new DateTime();
            $stmt = $this->database->connect()->prepare('
                  INSERT INTO advertisements (title,model,description,millage,productionYear,fuel,price,image,created_at,id_assigned_by, city,zipcode)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
                
            ');
            $useremail=$_COOKIE['userCookie'];
            //$assignedById=1;

            $stmt_temp = $this->database->connect()->prepare(
                'SELECT id FROM users where email = ?
'

            );
            $stmt_temp->execute([
                $useremail
            ]);
            $row = $stmt_temp->fetch(PDO::FETCH_ASSOC);
            $assignedById=$row['id'];
            $stmt->execute([
                    $project->getTitle(),
                    $project->getModel(),
                    $project->getDescription(),
                    $project->getMillage(),
                    $project->getProductionYear(),
                    $project->getFuel(),
                    $project->getPrice(),
                    $project->getImage(),
                    $date->format('Y-m-d'),
                    $assignedById,
                    $project->getCity(),
                    $project->getZipcode(),

                ]


            );

        }
    public function getProjects (): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM advertisements'

        );
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($projects as $project){
            $result [] = new Project(
                $project['title'],
                $project['description'],
                $project['model'],
                $project['millage'],
                $project['productionyear'],
                $project['fuel'],
                $project['price'],
                $project['image'],
                $project['city'],
                $project['zipcode'],
                $project['id']

            );

        }


        return $result;

    }
    public function getProjectByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
            
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteProject(int $id){
        $stmt = $this->database->connect()->prepare('
            DELETE FROM advertisements WHERE id = :id
         ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
