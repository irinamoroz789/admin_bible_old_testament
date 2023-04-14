const dt = new DataTransfer();
let question_count = 0;
let input_question_count = document.getElementById("input_question_count");
let input_answer_count_arr = [1];


function changeImage(elem){
    let $files_list = $(elem).closest('.input-file').next();
    $files_list.empty();

    for(let i = 0; i < elem.files.length; i++){
        let file = elem.files.item(i);
        dt.items.add(file);

        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function(){
            let new_file_input = '<div class="input-file-list-item">' +
                '<img class="input-file-list-img" src="' + reader.result + '">' +
                '<span class="input-file-list-name">' + file.name + '</span>' +
                '<a href="#" onclick="removeFilesItem(this); return false;" class="input-file-list-remove">x</a>' +
                '</div>';
            $files_list.append(new_file_input);
        }
    };
    elem.files = dt.files;
}
function removeFilesItem(target){
    let name = $(target).prev().text();
    let input = $(target).closest('.input-file-row').find('input[type=file]');
    $(target).closest('.input-file-list-item').remove();
    for(let i = 0; i < dt.items.length; i++){
        if(name === dt.items[i].getAsFile().name){
            dt.items.remove(i);
        }
    }
    input[0].files = dt.files;
}

function addAnswer(elem) {
    let newAnswer = document.createElement("div");
    let new_answer_count = +elem.closest(".inputFormQuestion").dataset.answer_count + 1;
    newAnswer.id = `inputFormAnswer_${question_count}_${new_answer_count}`;
    newAnswer.className = "inputFormAnswer";
    newAnswer.innerHTML = `
    <div class="input-group">
    <input type="text" name="answer_${question_count}_${new_answer_count}"  placeholder="Введите ответ" autocomplete="off">
    <div class="input-group-append">
    <button id="removeAnswer" type="button" class="btn-danger" onclick="deleteAnswer(this)">Удалить</button>
    </div>
    </div>`;

    // $('#newAnswer').append(html);
    elem.previousElementSibling.appendChild(newAnswer);
    elem.closest(".inputFormQuestion").dataset.answer_count = new_answer_count;
    let question_id = elem.closest(".inputFormQuestion").id.split("_")[1];
    document.getElementById("input_answer_count_" + question_id).value = new_answer_count;


}
function checkIndexAnswer(elem){
    console.log(elem);
    let new_answer_count = +elem.dataset.answer_count - 1;
    elem.dataset.answer_count = new_answer_count;
    let answer_inputs = document.querySelectorAll(`#${elem.id} .inputFormAnswer input`);
    let answer_form = document.querySelectorAll(`#${elem.id} .inputFormAnswer`);
    for(let i = 0; i < answer_inputs.length; i++){

        let old_name =  answer_inputs[i].getAttribute("name").split("_");
        answer_inputs[i].setAttribute("name",  `${old_name[0]}_${question_count}_${i+1}`);
        answer_form[i].id = `inputFormAnswer_${old_name[1]}_${i+1}`;

    }
    let question_id = elem.id.split("_")[1];
    document.getElementById("input_answer_count_" + question_id).value = new_answer_count;
}
function deleteAnswer(elem){
    let parent = elem.closest(".inputFormQuestion");
    // console.log(parent);
    $(elem).closest('.inputFormAnswer').remove();
    checkIndexAnswer(parent);


}
function addQuestion(elem){
    question_count +=1;
    input_question_count.value = question_count+1;
    let html = `
     <div id="inputFormQuestion_${question_count}" class="inputFormQuestion" data-answer_count="1">
         <div class="delete-question>">
             <button id="removeQuestion" class="button-trash" type="button" onclick="deleteQuestion(this)">
             <object type="image/svg+xml" data="trash.svg"></object>
             </button>
         </div>
         <h3>Вопрос</h3>
          <!-- <input type="hidden" name="answer_count_${question_count}"  id="input_answer_count_${question_count}" class="answer_count">-->
           <input type="hidden" name="answer_count[]"  id="input_answer_count_${question_count}" class="answer_count" value="1">
         <div id="addQuestion" onclick="addQuestion(this)"><span class="noselect">Добавить вопрос</span>
             <div id="circle"></div>
         </div>
         <br>
         <input type="text" class="question" name="question_${question_count}" placeholder="Текст вопроса"><br>
         <h3>Варианты ответов</h3>
         <div id="inputFormAnswer_${question_count}_1" class="inputFormAnswer">
             <div class="input-group">
                 <input type="text" name="answer_${question_count}_1" class="form-control m-input" placeholder="Введите ответ" autoComplete="off">
                 <div class="input-group-append">
                     <button id="removeAnswer" type="button" class="btn-danger" onclick="deleteAnswer(this)">Удалить</button>
                 </div>
             </div>
         </div>
         <div class="newAnswer"></div>
         <div id="addAnswer" class="add_answer" onclick="addAnswer(this)">+</div><br>
         <input type="number" name="response_answer_${question_count}" class="response_answer" min="1" step="1" placeholder="Номер ответа" onChange="this.value = parseInt(this.value)"><br>
         <div class="input-file-row">
             <label class="input-file">
             <input type="file" name="image_${question_count}" class="image" multiple accept="image/*" onchange="changeImage(this)">
             <span>Загрузить картинку</span>
             </label>
              <div class="input-file-list"></div>
         </div>
         <input type="text" name="img_caption_${question_count}" class="img_caption" placeholder="Описание картинки"><br>
         <textarea placeholder="Комментарий к ответу..." name="comment_${question_count}" class="comment" rows="3"></textarea><br>
     </div>`;

    $('.form').append(html);
    $(elem).closest('#addQuestion').remove();
}
function deleteQuestion(elem){
    let parent = elem.closest(".inputFormQuestion");
    // console.log("input form question: ", $(elem).closest('.inputFormQuestion'));
    $(elem).closest('.inputFormQuestion').remove();
    // document.getElementsByClassName('form')[0].removeChild(elem.closest('.inputFormQuestion'));
    question_count --;
    input_question_count.value = question_count+1;
    checkIndex();
    checkIndexAnswer(parent);


    if(!document.getElementById('addQuestion')){
        let new_add_question_btn = document.createElement("div");
        new_add_question_btn.id = "addQuestion";
        new_add_question_btn.onclick = addQuestion;
        new_add_question_btn.innerHTML = "<span class=\"noselect\">Добавить вопрос</span><div id=\"circle\"></div>";
        document.getElementById(`inputFormQuestion_${question_count}`).insertBefore(new_add_question_btn, document.querySelector(`#inputFormQuestion_${question_count} br`));
    }

}
function sayHello(elem){
    console.log("say hello, ", elem);
}
function checkIndex(){
    let question_inputs = document.getElementsByClassName("question");
    let response_answer_inputs = document.getElementsByClassName("response_answer");
    let image_inputs = document.getElementsByClassName("image");
    let img_caption_inputs = document.getElementsByClassName("img_caption");
    let comment_inputs = document.getElementsByClassName("comment");
    let answer_count_inputs = document.getElementsByClassName("answer_count");

    let question_form = document.getElementsByClassName("inputFormQuestion");
    for(let i = 0; i < question_inputs.length; i++){
        question_form[i].id = "inputFormQuestion_"+i;
        question_inputs[i].setAttribute("name", "question_"+i);
        response_answer_inputs[i].setAttribute("name", "response_answer_"+i);
        image_inputs[i].setAttribute("name", "image_"+i);
        img_caption_inputs[i].setAttribute("name", "img_caption_"+i);
        comment_inputs[i].setAttribute("name", "comment_"+i);
        answer_count_inputs[i].id = "input_answer_count_"+i;

    }
}
function addTag(open, close) {
    let control = $('#control')[0];
    let start = control.selectionStart;
    let end = control.selectionEnd;
    if (start != end) {
        let text = $(control).val();
        $(control).val(text.substring(0, start) + open + text.substring(start, end) + close + text.substring(end));
        $(control).focus();
        let sel = end + (open + close).length;
        control.setSelectionRange(sel, sel);
    }
    return false;
}
// Заголовок
$('#button-h1').click(function(){
    return addTag('<h1>', '</h1>');
});
// Жирный
$('#button-b').click(function(){
    return addTag('<b>', '</b>');
});

// Курсив
$('#button-i').click(function(){
    return addTag('<i>', '</i>');
});

// При клике на кнопки не снимаем фокус с textarea.
$('a').on('mousedown', function() {
    return false;
});