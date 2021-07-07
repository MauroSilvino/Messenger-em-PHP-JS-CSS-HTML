const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
	e.preventDefault();
}

continueBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/login.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status ===200){
				let data = xhr.response;
				if(data == "Sucesso"){
					location.href = "users.php";
				}else{
					errorText.textContent = data;
					errorText.style.dysplay = "block";
				}
			}
		}
	}

	let formData = new formData(form);
	xhr.send(formData);
}