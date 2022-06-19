<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';;
require_once __DIR__.'/../repository/ProjectRepository.php';


class ProjectController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';
    private $messages = [];
    private $projectRepository;

    public function __construct()
    {

        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }
    public function advertisements (){

        $projects = $this->projectRepository->getProjects();
        $this->render('advertisement', ['projects' => $projects]);
    }

    public function addProject()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $project = new Project($_POST['title'],$_POST['description'],$_POST['cars'],$_POST['Millage'],$_POST['ProductionYear'],$_POST['Fuel'],$_POST['Price']
                ,$_FILES['file']['name']);

            $this->projectRepository->addProject($project);

            return $this->render('advertisement', [
                'messages'=>$this->messages,
                'projects' => $this->projectRepository->getProjects()]);
        }

        $this->render('addcar', [
            'projects' => $this->projectRepository->getProject(),'messages'=>$this->messages]);
    }

    public function search()
    {
        //TODO


    }



    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES))
        {
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }

}