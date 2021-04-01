  let numOfSub = 2;
  let num = [];
  let tmp = [];
  let testgrade = [];
  let gp = 0, gpa = 0;
  let sumOfGrd = 0; //単位数の合計
  let text = "<input type='text' value='0' id = 'score1'> <br> <div> <input type='radio' id='contactChoice1' name='tannisu1' value='1'> <label for='contactChoice1'>1単位</label> <input type='radio' id='contactChoice2' name='tannisu1' value='2' checked> <label for='contactChoice2'>2単位</label> <input type='radio' id='contactChoice3' name='tannisu1' value='4'> <label for='contactChoice3'>4単位</label> <input type='radio' id='contactChoice4' name='tannisu1' value='8'> <label for='contactChoice4'>8単位</label>    </div>";
  document.getElementById('scorebox').innerHTML = text;
  //num[1] = document.getElementById(`score1`).value;
  /*
for(let i = 1; i < numOfSub; i++){
  num[i] = document.getElementById('score' + i);
};
  */
function buttonClick(){
  let sum = 0;
  sumOfGrd = 0;
  gpa = 0;
  gp = 0;
  for(let i = 1; i < numOfSub; i++){
        num[i] = document.getElementById(`score${i}`).value;
        tmp[i] = num[i];
        if((num[i] < 60)&&(num[i] >= 0)){
          testgrade[i] = 0;
        }else if((num[i] >= 60) && (num[i] <= 100)){
          testgrade[i] = (num[i] - 55) / 10;
        }else{
          document.getElementById('msg').innerHTML = "0から100までの数値を入力してください";
          return 0;
        }
        sum += Number(num[i]);
  }

  for(let i = 1; i < numOfSub; i++){
    //単位選択情報の一時格納用
    let s = document.getElementsByName(`tannisu${i}`);
    for(let j = 0; j < s.length; j++){
      if(s[j].checked){
        sumOfGrd += Number(s[j].value);
        gp += testgrade[i] * Number(s[j].value);
      }
    }
    document.getElementById('grd').innerHTML = "合計単位数は" + sumOfGrd + "です";
  }

  gpa = gp / sumOfGrd;
  document.getElementById('msg').innerHTML = "合計スコアは" + sum + "です";
  document.getElementById('msg').innerHTML = "GPAは" + gpa + "です";

}

function addSubject(){

  for(let i = 1; i < numOfSub; i++){
        num[i] = document.getElementById(`score${i}`).value;
        tmp[i] = num[i];
  }
  //新たなscore格納テキストボックスを追加
  text = text + `<input type='text' value='0' id = 'score${numOfSub}'> <br> <div> <input type='radio' id='contactChoice1' name='tannisu${numOfSub}' value='1'> <label for='contactChoice1'>1単位</label> <input type='radio' id='contactChoice2' name='tannisu${numOfSub}' value='2' checked> <label for='contactChoice2'>2単位</label> <input type='radio' id='contactChoice3' name='tannisu${numOfSub}' value='4'> <label for='contactChoice3'>4単位</label> <input type='radio' id='contactChoice4' name='tannisu${numOfSub}' value='8'> <label for='contactChoice4'>8単位</label>    </div>`;
  document.getElementById('scorebox').innerHTML = text;
  //すべてのscoreのvalueにtmpに記憶していたscore.valueを代入
  for(let i = 1; i < numOfSub; i++){
    document.getElementById(`score${i}`).value = tmp[i];
  }
  numOfSub++;
}

function remSubject(){

}
