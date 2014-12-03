
var numOfProjects = pastProjects.length;
var projectsByCategory = {};

function howManyProjectsPerCategory() {
    pastProjects.forEach( function(project) {
        if (!(project.category in projectsByCategory))
            projectsByCategory[project.category] = 1;
        else
            projectsByCategory[project.category]++;
    });
}

function showProject(project) {
    $("#listOfProjects").append('<tr><td>' + project.name + '</td><td>'+ 
                                project.category + '</td><td>' +
                                project.students + '</td><td>' + 
                                project.advisor + '</td><td>' +
                                project.description + '</td></tr>');
}

$(document).ready(function() {
    debugger;
    howManyProjectsPerCategory();
    pastProjects.forEach(showProject);
});