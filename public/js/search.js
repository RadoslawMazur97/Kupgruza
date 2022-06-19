const search = document.querySelector('input[placeholder ="search car"]');
const projectContainer = document.querySelector(".projects");


    search.addEventListener("keyup", function(event){
        if(event.key === "Enter"){
            event.preventDefault();

            const data = {search: this.value};
            fetch ("/search",{
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
            }).then(function(response){
                return response.json();
                
            }).then(function(projects){
                projectContainer.innerHTML="";



                loadProjects(projects)
                
                
                
            })

        }


    });

function loadProjects(projects) {
    projects.forEach(project =>{
        console.log(project);
        createProject(project);
    });
}

function createProject(project){
    const template = document.querySelector("#project-template");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/img/uploads/${project.image}`;
    const title = clone.querySelector("h3");
    title.innerHTML = project.title;
    const description = clone.querySelector("h4");
    description.innerHTML= project.description;
    const model= clone.querySelector("p");
    model.innerText = project.model + " " + project.productionyear + " " + project.fuel;

    projectContainer.appendChild(clone);


}