<?php
return function($site){

    $allProjects = new Collection();

    foreach ($site -> children() -> template('projects') as $projectCollection) {
        foreach ($projectCollection -> children() as $project) {
            $allProjects -> add($project -> children());
        }
    }
    return $allProjects;
};