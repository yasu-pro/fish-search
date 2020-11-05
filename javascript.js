//console.log(creatureName);


const popUpImg = document.getElementById("popUpImg");
const imges =document.querySelectorAll('.imges');
const popUp = document.getElementById("popUp");
 
for (var i =0 ; i < imges.length; i++ ) {

	imges[i].addEventListener("click",(event) => {
		
		//クリックされた画像のIDを取得
		const id = event.target.id;
		const imgId = document.getElementById(id);
		//取得した画像のパスを取得
		const imgPass = imgId.getAttribute("src");
		
		//クラすpopUpImgのimg要素に取得した画像パスを指定
		popUpImg.src = imgPass;

		//ポップアップ画像にaltを指定するためクリックされた画像のaltを取得
		const alt = imgId.getAttribute("alt");
		creatureName.textContent = alt;
		
		popUpImg.alt = alt;


	});
	//画像がクリックされたらfadeOutを消してfadeInをクラスとしてID名popUpに追加
	imges[i].addEventListener("click",(event) => {
		popUp.classList.remove("fadeOut");
		popUp.classList.add("fadeIn");
		popUp.style.display = "block";
	});

}
	//ポップアップのcloseボタンをクリックするとfadeInを削除して、fadeOutを付与
	const closeButton = document.getElementById("closeButton");
	closeButton.addEventListener("click",() => {
		popUp.classList.remove("fadeIn")
		popUp.classList.add("fadeOut");
		//displayを三秒後にnoneに変更
		setTimeout(function() {
    		popUp.style.display ='none';
    	}, 3000);
	});

