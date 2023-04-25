var famousPeople=[];
var results = document.getElementById("actorsname");

function getFamousPeople(birthdate){
const xhr = new XMLHttpRequest();
if(birthdate == "")
return;
var date = new Date(birthdate);
var day = date.getDate();
var month = date.getMonth() + 1;



xhr.addEventListener("readystatechange",function(){
	if (xhr.readyState==4&&xhr.status==200) {
		console.log({month,day});
		console.log(this.response);
        famousPeople = JSON.parse(xhr.response);
		console.log(famousPeople[0]);
        if(famousPeople.length==0){
			results.innerHTML="<p>No results</p>"
		}
		
		for (let i = 0; i < famousPeople.length; i++) {
			let id = famousPeople[i].substr(6, 9);
			console.log(id);
        	setTimeout(() => {
          		getFamousPeopleName(id);
        	}, i * 500); 
		}
	}
});

xhr.open("GET", `https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=${month}&day=${day}`);
xhr.setRequestHeader("X-RapidAPI-Key", "2390190db3msh9a8c0e9e87f7e47p15f44cjsnc1fffbf4d9d9");
xhr.setRequestHeader("X-RapidAPI-Host", "online-movie-database.p.rapidapi.com");
xhr.send();


}


var actorNames = [];

let html=``;
function getFamousPeopleName(id)
{

	var xhr = new XMLHttpRequest();
	
	xhr.addEventListener("readystatechange", function () {
		
		if (xhr.readyState==4&&xhr.status==200) {
			let obj = JSON.parse(xhr.response);
			
					actorNames.push(obj["name"]);
				  	console.log(obj["name"]);
                      html+=`<li>${obj["name"]}</li>`;
				
		
		console.log({html});
        console.log({actorNames});

		results.innerHTML=html;
	}});
	xhr.open("GET", `https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=${id}`);
	xhr.setRequestHeader("X-RapidAPI-Key", "2390190db3msh9a8c0e9e87f7e47p15f44cjsnc1fffbf4d9d9");
	xhr.setRequestHeader("X-RapidAPI-Host", "online-movie-database.p.rapidapi.com");
	xhr.send();
	
}
