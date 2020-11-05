<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
    <link rel="stylesheet" href="styles.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="top">
      <h1 class="top__heading">海洋生物画像検索</h1>
      <div class="top__form">
        <form action="index.php" method="get">
          <input
            class="top__text"
            type="text"
            name="name"
            placeholder="生物の名前または種類"
          />
          <div class="top__submit">
            <input class="top__submitButton" type="submit" value="検索" />
          </div>
        </form>
      </div>
    </div>
    <main>
    	<div class = "searchResult">
    		<?php
    			//検索されたワードが存在し、空文字ではないか確認
    			if(isset($_GET['name']) == true && $_GET['name'] != ""){
    				$name = $_GET['name'];
    				
    				//tag.phpを呼び出す
	    			require_once('./data/tag.php');
	    			
	    			$title = '';
					$matchArray =[];
					$searchWord='';
					$creatureName=[];

					//配列からkeyと値を取得
	    			foreach($keywords as $creatureKey => $keywordArray){
	    				//取得した$keywordArrayは、配列なので、もう一度foreachで値を取得
	    				foreach($keywordArray as $keyword => $searchWord){
							
							//入力された文字と配列の文字が一緒で、$imgListと$keywordsのキーワードが一緒であれば、一緒だったデータを$matchArrayに格納する
	    					if($name === $searchWord){
								
								$title ="{$name}の検索結果";								
								
								foreach($imgList as $number => $creatureInfo){
										if($creatureInfo[1] === $keywordArray){
										array_push($matchArray,$creatureInfo);
										
									}

								}
	    					}
	    				}
					}
					if(empty($matchArray)){
						$title ="該当する画像がみつかりませんでした";
					}

	    			
					
	    			echo("<h2 class=\"searchResult__heading\" id =\"searchResult__heading\">{$title}</h2>");
	    			echo("<div class=\"searchResult__img\">");
	    			//$matchArrayに格納されているデータの画像パスとナンバーを取り出し、画像を表示し、$imgNumberはidとして表示
					foreach($matchArray as $imgNumber => $imgPass){
						array_push($numberArray,$imgNumber);
						echo("<img class= \"imges\" id= \"img{$imgNumber}\" src={$imgPass[0]} alt=\"{$imgPass[1][0]}\" width=\"450px\" height=\"250px\"></a>");
						
					}
					echo("</div>");
					
					echo("<div id=\"popUp\"><h3 id=\"creatureName\"></h3><div id=\"popUpImgArea\"><img id=\"popUpImg\"></div><div class= \"buttonArea\"><button id=\"closeButton\">閉じる</button></div></div>");
						
		
	    		}
	    		//検索文字が空文字だった場合、ページを更新する
    			elseif(isset($_GET['name']) == true && $_GET['name'] == ""){
					header("Location: " . $_SERVER['PHP_SELF']);
					exit();
				}
    		?>
    	</div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./javascript.js"></script>
    
  </body>
</html>
