
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
    $("#listOfProjects").append('<tr><td>Project: ' + project.name + '<br/><br/>Category: '+ 
                                project.category + '<br/>Students: ' +
                                project.students + '<br/>Faculty: ' + 
                                project.advisor + '<br/><br/>Description:<br/>' +
                                project.description + '</td></tr>');
}

function showGraph() {
    debugger;
    var c = document.getElementById("graphOfProjectCategories");
    var ctx = c.getContext("2d");
    ctx.font = "20px Gill Sans";
    var x = 20;
    var bottomLefty = 500;
    for (category in projectsByCategory) {
        ctx.fillStyle = '#D80000';
        var height = projectsByCategory[category]/numOfProjects * 500;
        ctx.fillRect(x, bottomLefty - height,50,height);
        ctx.fillStyle = '#000000';
        ctx.fillText(projectsByCategory[category], x + 20, bottomLefty - height - 2);
        ctx.rotate(90 * Math.PI / 180);
        //ctx.translate(70,0);
        ctx.fillText(category, bottomLefty + 2, -x - 20);
        x += 51;
        ctx.rotate(-90*Math.PI/180);
    }
    ctx.font = "30px Gill Sans";
    ctx.fillText(numOfProjects + " Total Projects", 20, 25);
}

$(document).ready(function() {
    howManyProjectsPerCategory();
    pastProjects.forEach(showProject);
    showGraph();
});